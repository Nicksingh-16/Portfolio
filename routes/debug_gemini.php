<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

Route::get('/debug-gemini', function () {
    $keys = [
        env('GEMINI_API_KEY_1'),
        env('GEMINI_API_KEY_2'),
        env('GEMINI_API_KEY_3'),
    ];

    $results = [];

    foreach ($keys as $index => $key) {
        if (!$key) {
            $results["Key " . ($index + 1)] = "MISSING";
            continue;
        }

        // Check available models
        $url = 'https://generativelanguage.googleapis.com/v1beta/models?key=' . $key;
        
        $response = Http::withoutVerifying()->get($url);

        $results["Key " . ($index + 1)] = [
            'status' => $response->status(),
            'body' => $response->json(),
            'key_preview' => substr($key, 0, 5) . '...'
        ];
    }

    file_put_contents(public_path('debug_output.json'), json_encode($results, JSON_PRETTY_PRINT));
    return "Check public/debug_output.json";
});
