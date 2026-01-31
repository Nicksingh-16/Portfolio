<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio
     */
    public function index()
    {
        // Load resume data from JSON file
        $resumeDataPath = base_path('resume_data.json');
        
        if (!file_exists($resumeDataPath)) {
            abort(500, 'Resume data file not found');
        }

        $resumeData = json_decode(file_get_contents($resumeDataPath), true);

        return view('portfolio', [
            'personalInfo' => $resumeData['personal_info'] ?? [],
            'objective' => $resumeData['objective'] ?? '',
            'workExperience' => $resumeData['work_experience'] ?? [],
            'education' => $resumeData['education'] ?? [],
            'skills' => $resumeData['skills'] ?? [],
            'projects' => $resumeData['projects'] ?? [],
            'corporateProjects' => $resumeData['projects']['corporate'] ?? [],
            'conceptProjects' => $resumeData['projects']['concepts'] ?? [],
        ]);
    }
}
