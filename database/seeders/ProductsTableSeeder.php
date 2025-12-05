<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // كفرات وحمايات
            [
                'name' => 'كفر آيفون 14 حماية كاملة',
                'description' => 'كفر شفاف عالي الجودة يحمي الهاتف من الصدمات مع حماية للشاشة والكاميرا',
                'price' => 49.99,
                'image' => '/images/iphone-case.jpg',
                'stock' => 50,
                'category_id' => 1,
                'is_active' => true
            ],
            [
                'name' => 'حافظة سامسونج جالكسي S23',
                'description' => 'حافظة أنيقة مع حماية متكاملة وحافظة منفصلة للبطاقات',
                'price' => 59.99,
                'image' => '/images/samsung-case.jpg',
                'stock' => 35,
                'category_id' => 1,
                'is_active' => true
            ],
            [
                'name' => 'حافظة أيفون جلد طبيعي',
                'description' => 'حافظة فاخرة من الجلد الطبيعي بتصميم أنيق يحمي الهاتف',
                'price' => 89.99,
                'image' => '/images/leather-case.jpg',
                'stock' => 20,
                'category_id' => 1,
                'is_active' => true
            ],
            [
                'name' => 'حماية شاشة زجاجية',
                'description' => 'حماية شاشة زجاجية مقواة ضد الخدوش والكسر',
                'price' => 29.99,
                'image' => '/images/screen-protector.jpg',
                'stock' => 100,
                'category_id' => 1,
                'is_active' => true
            ],

            // شواحن
            [
                'name' => 'شاحن سريع 20 واط',
                'description' => 'شاحن سريع مع كابل USB-C، شحن سريع وآمن لجميع الأجهزة',
                'price' => 79.99,
                'image' => '/images/fast-charger.jpg',
                'stock' => 30,
                'category_id' => 2,
                'is_active' => true
            ],
            [
                'name' => 'شاحن لاسلكي',
                'description' => 'شاحن لاسلكي سريع مع مؤشر ضوئي، شحن سهل وسريع',
                'price' => 99.99,
                'image' => '/images/wireless-charger.jpg',
                'stock' => 25,
                'category_id' => 2,
                'is_active' => true
            ],
            [
                'name' => 'شاحن سيارة سريع',
                'description' => 'شاحن سيارة سريع بمنفذ مزدوج، مثالي للرحلات',
                'price' => 49.99,
                'image' => '/images/car-charger.jpg',
                'stock' => 40,
                'category_id' => 2,
                'is_active' => true
            ],

            // سماعات
            [
                'name' => 'سماعات لاسلكية',
                'description' => 'سماعات بلوتوث عالية الجودة مع ميكروفون مدمج وبطارية طويلة',
                'price' => 129.99,
                'image' => '/images/wireless-earphones.jpg',
                'stock' => 25,
                'category_id' => 3,
                'is_active' => true
            ],
            [
                'name' => 'سماعات أذن سلكية',
                'description' => 'سماعات أذن عالية الجودة مع عزل للضجيج وميكروفون',
                'price' => 39.99,
                'image' => '/images/wired-earphones.jpg',
                'stock' => 60,
                'category_id' => 3,
                'is_active' => true
            ],

            // إكسسوارات متنوعة
            [
                'name' => 'حامل سيارة معدني',
                'description' => 'حامل سيارة معدني قابل للتعديل، تثبيت قوي وسهل',
                'price' => 34.99,
                'image' => '/images/car-holder.jpg',
                'stock' => 45,
                'category_id' => 4,
                'is_active' => true
            ],
            [
                'name' => 'قلم ستايلس للشاشات',
                'description' => 'قلم ستايلس دقيق للرسم والكتابة على الشاشات',
                'price' => 24.99,
                'image' => '/images/stylus-pen.jpg',
                'stock' => 70,
                'category_id' => 4,
                'is_active' => true
            ],
            [
                'name' => 'حافظة سماعات',
                'description' => 'حافظة سماعات مضادة للماء والصدمات، تخزين آمن',
                'price' => 19.99,
                'image' => '/images/earphone-case.jpg',
                'stock' => 80,
                'category_id' => 4,
                'is_active' => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
