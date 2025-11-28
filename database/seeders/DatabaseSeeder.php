<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء التصنيفات
        $categories = [
            ['name' => 'كفرات وحمايات', 'slug' => 'covers'],
            ['name' => 'شواحن', 'slug' => 'chargers'],
            ['name' => 'سماعات', 'slug' => 'earphones'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // إنشاء منتجات تجريبية
        $products = [
            [
                'name' => 'كفر آيفون 14 حماية كاملة',
                'description' => 'كفر شفاف يحمي الهاتف من الصدمات',
                'price' => 49.99,
                'image' => 'https://via.placeholder.com/300',
                'stock' => 50,
                'category_id' => 1
            ],
            [
                'name' => 'شاحن سريع 20 واط',
                'description' => 'شاحن سريع مع كابل USB-C',
                'price' => 79.99,
                'image' => 'https://via.placeholder.com/300',
                'stock' => 30,
                'category_id' => 2
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
