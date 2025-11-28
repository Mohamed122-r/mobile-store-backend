<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Mobile Store API - Running without DB',
        'timestamp' => now()
    ]);
});

Route::get('/health', function () {
    return response()->json(['status' => 'healthy']);
});

Route::get('/api/products', function () {
    // بيانات تجريبية بدون قاعدة بيانات
    return response()->json([
        'success' => true,
        'data' => [
            [
                'id' => 1,
                'name' => 'كفر آيفون 14',
                'description' => 'كفر حماية شفاف',
                'price' => 49.99,
                'image' => '/images/placeholder.jpg',
                'category' => 'كفرات وحمايات'
            ],
            [
                'id' => 2,
                'name' => 'شاحن سريع 20 واط', 
                'description' => 'شاحن سريع مع كابل USB-C',
                'price' => 79.99,
                'image' => '/images/placeholder.jpg',
                'category' => 'شواحن'
            ]
        ]
    ]);
});
