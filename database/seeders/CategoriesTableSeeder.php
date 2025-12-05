<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'كفرات وحمايات',
                'slug' => 'covers',
                'description' => 'أفضل كفرات وحمايات للجوالات'
            ],
            [
                'name' => 'شواحن',
                'slug' => 'chargers', 
                'description' => 'شواحن سريعة وأصلية'
            ],
            [
                'name' => 'سماعات',
                'slug' => 'earphones',
                'description' => 'سماعات لاسلكية وسلكية'
            ],
            [
                'name' => 'إكسسوارات متنوعة',
                'slug' => 'accessories',
                'description' => 'إكسسوارات متنوعة للجوالات'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
