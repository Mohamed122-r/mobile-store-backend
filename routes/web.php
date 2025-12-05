<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'مرحباً بك في متجر إكسسوارات الجوال - Mobile Store API',
        'version' => '1.0.0',
        'frontend_url' => 'https://mobile-store-frontend-pi.vercel.app',  // 🔄 رابط الفورنت
        'endpoints' => [
            'GET /api/health' => 'فحص حالة الـ API',
            'GET /api/products' => 'جميع المنتجات',
            'GET /api/products/featured' => 'المنتجات المميزة',
            'GET /api/products/{id}' => 'تفاصيل منتج',
            'GET /api/categories' => 'جميع التصنيفات',
            'GET /api/cart' => 'عرض السلة',
            'POST /api/cart/add' => 'إضافة منتج للسلة',
            'POST /api/orders' => 'إنشاء طلب جديد'
        ]
    ]);
});
