<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Mobile Store API is running!',
        'timestamp' => now(),
        'port' => $_ENV['PORT'] ?? 'unknown'
    ]);
});

Route::get('/health', function () {
    return response()->json(['status' => 'healthy']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'Test endpoint works!']);
});
