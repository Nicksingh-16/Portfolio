<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ChatbotController;

// Main Portfolio Route
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

// API Routes for Chatbot
Route::post('/api/chatbot', [ChatbotController::class, 'chat'])->name('chatbot.chat');

// Debug Route
require __DIR__ . '/debug_gemini.php';
