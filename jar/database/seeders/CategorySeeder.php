<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Categories matching the frontend list (Arabic names and English slugs)
        $categories = [
            ['slug' => 'vehicles', 'name' => 'المركبات', 'is_active' => true, 'sort_order' => 1],
            ['slug' => 'electronics', 'name' => 'الإلكترونيات', 'is_active' => true, 'sort_order' => 2],
            ['slug' => 'tools-equipment', 'name' => 'الأدوات والمعدات', 'is_active' => true, 'sort_order' => 3],
            ['slug' => 'party-events', 'name' => 'الاحتفالات والفعاليات', 'is_active' => true, 'sort_order' => 4],
            ['slug' => 'sports-recreation', 'name' => 'الرياضة والترفيه', 'is_active' => true, 'sort_order' => 5],
            ['slug' => 'home-garden', 'name' => 'المنزل والحديقة', 'is_active' => true, 'sort_order' => 6],
            ['slug' => 'camping-equipment', 'name' => 'معدات التخييم', 'is_active' => true, 'sort_order' => 7],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
