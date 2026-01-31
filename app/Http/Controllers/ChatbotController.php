<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ChatbotController extends Controller
{
    private $geminiApiKeys;
    private $geminiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent';

    public function __construct()
    {
        // Load all available API keys
        $this->geminiApiKeys = array_filter([
            env('GEMINI_API_KEY_1'),
            env('GEMINI_API_KEY_2'),
            env('GEMINI_API_KEY_3'),
        ]);
    }

    /**
     * Get API key using round-robin strategy
     */
    private function getApiKey()
    {
        if (empty($this->geminiApiKeys)) {
            throw new \Exception('No Gemini API keys configured');
        }

        // Get current counter from cache
        $counter = Cache::get('gemini_api_key_counter', 0);
        
        // Select key using round-robin
        $keyIndex = $counter % count($this->geminiApiKeys);
        $apiKey = array_values($this->geminiApiKeys)[$keyIndex];
        
        // Increment counter for next request
        Cache::put('gemini_api_key_counter', $counter + 1, 3600);
        
        return $apiKey;
    }

    /**
     * Handle chatbot messages
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $userMessage = $request->input('message');

        try {
            // Get portfolio context
            $portfolioContext = $this->getPortfolioContext();

            // Build the prompt with context
            $prompt = $this->buildPrompt($userMessage, $portfolioContext);

            // Get API key using round-robin
            $apiKey = $this->getApiKey();

            // Call Gemini API
            $response = Http::withoutVerifying()->timeout(30)->post($this->geminiApiUrl . '?key=' . $apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 1024,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $aiResponse = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'I apologize, but I couldn\'t generate a response.';

                return response()->json([
                    'success' => true,
                    'response' => $aiResponse
                ]);
            } else {
                Log::error('Gemini API Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'key_used' => substr($apiKey, 0, 5) . '...' // Log partial key to debug
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to get AI response'
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request'
            ], 500);
        }
    }

    /**
     * Build prompt with portfolio context
     */
    private function buildPrompt($userMessage, $context)
    {
        return <<<PROMPT
You are an AI assistant for Nishant Shekhawat's portfolio website. Your role is to help visitors learn about Nishant's professional background, skills, and projects.

CONTEXT ABOUT NISHANT:
{$context}

USER QUESTION: {$userMessage}

INSTRUCTIONS:
- Provide helpful, accurate information based on the context above
- Be professional yet friendly
- Keep responses concise (2-4 sentences unless more detail is specifically requested)
- If asked about something not in the context, politely say you don't have that information
- Highlight Nishant's strengths and achievements naturally
- Use bullet points for lists when appropriate
- Don't make up information not present in the context

Please respond to the user's question:
PROMPT;
    }

    /**
     * Get portfolio context from resume data
     */
    private function getPortfolioContext()
    {
        // Cache the context for 1 hour to reduce file reads
        return Cache::remember('portfolio_context', 3600, function () {
            $resumeDataPath = base_path('resume_data.json');
            
            if (!file_exists($resumeDataPath)) {
                return $this->getDefaultContext();
            }

            $resumeData = json_decode(file_get_contents($resumeDataPath), true);

            return $this->formatContext($resumeData);
        });
    }

    /**
     * Format resume data into context string
     */
    private function formatContext($data)
    {
        $context = "";

        // Personal Info
        if (isset($data['personal_info'])) {
            $info = $data['personal_info'];
            $context .= "PERSONAL INFORMATION:\n";
            $context .= "Name: {$info['name']}\n";
            $context .= "Title: {$info['title']}\n";
            $context .= "Email: {$info['email']}\n";
            $context .= "Phone: {$info['phone']}\n";
            $context .= "Location: {$info['location']}\n\n";
        }

        // Objective
        if (isset($data['objective'])) {
            $context .= "PROFESSIONAL OBJECTIVE:\n{$data['objective']}\n\n";
        }

        // Work Experience
        if (isset($data['work_experience'])) {
            $context .= "WORK EXPERIENCE:\n";
            foreach ($data['work_experience'] as $job) {
                $context .= "- {$job['position']} at {$job['company']} ({$job['duration']})\n";
                if (isset($job['achievements'])) {
                    foreach ($job['achievements'] as $achievement) {
                        $context .= "  • {$achievement}\n";
                    }
                }
                $context .= "  Technologies: " . implode(', ', $job['technologies']) . "\n\n";
            }
        }

        // Skills
        if (isset($data['skills'])) {
            $context .= "TECHNICAL SKILLS:\n";
            foreach ($data['skills'] as $category => $skills) {
                $skillNames = array_map(function($skill) {
                    return $skill['name'];
                }, $skills);
                $context .= ucfirst(str_replace('_', ' ', $category)) . ": " . implode(', ', $skillNames) . "\n";
            }
            $context .= "\n";
        }

        // Projects
        if (isset($data['projects'])) {
            $context .= "KEY PROJECTS:\n";
            
            if (isset($data['projects']['corporate'])) {
                $context .= "Corporate Projects:\n";
                foreach ($data['projects']['corporate'] as $project) {
                    $context .= "- {$project['name']}: {$project['description']}\n";
                    $context .= "  Tech: " . implode(', ', $project['tech_stack']) . "\n";
                }
            }
            
            if (isset($data['projects']['personal'])) {
                $context .= "\nPersonal Projects:\n";
                foreach ($data['projects']['personal'] as $project) {
                    $context .= "- {$project['name']}: {$project['description']}\n";
                    if (isset($project['url'])) {
                        $context .= "  URL: {$project['url']}\n";
                    }
                }
            }
            $context .= "\n";
        }

        // Education
        if (isset($data['education'])) {
            $context .= "EDUCATION:\n";
            foreach ($data['education'] as $edu) {
                $context .= "- {$edu['degree']} from {$edu['institution']} (CGPA: {$edu['cgpa']}/{$edu['grade_scale']})\n";
            }
        }

        return $context;
    }

    /**
     * Get default context if resume data file doesn't exist
     */
    private function getDefaultContext()
    {
        return <<<CONTEXT
PERSONAL INFORMATION:
Name: Nishant Shekhawat
Title: Software Developer | PHP | Laravel Specialist
Email: nishantshekhawat2001@gmail.com
Phone: 8329387047

WORK EXPERIENCE:
- Laravel Developer at Webito Infotech (June 2024 - Present)
  • Developing enterprise applications using Laravel and CodeIgniter
  • Building REST APIs and microservices
  • Database optimization and performance tuning

- Software Developer at Astronaut Creatives (April 2023 - April 2024)
  • Full-stack development with Laravel and Angular
  • Fintech application development
  • Security and compliance implementation

TECHNICAL SKILLS:
Backend: Laravel, CodeIgniter, PHP, REST APIs
Frontend: HTML5, CSS3, JavaScript, Bootstrap, Angular
Database: MySQL, SQL
Tools: Git, Docker, CI/CD, Agile

KEY PROJECTS:
- Smart Water (Government IoT project for water management)
- IELTSBandAI (AI-powered language assessment platform)
- Enopeck Seals (Industrial CMS)
- Octanet (ISP Management Tool)

EDUCATION:
BSC Computer Science from University of Mumbai (CGPA: 9.43/10.0)
CONTEXT;
    }
}
