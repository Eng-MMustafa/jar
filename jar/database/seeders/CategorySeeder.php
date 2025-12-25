<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Vehicles',
                'name_ar' => 'المركبات',
                'slug' => 'vehicles',
                'description_en' => 'Cars, motorcycles, and other vehicles for rent',
                'description_ar' => 'سيارات، دراجات نارية، ومركبات أخرى للإيجار',
                'icon' => 'fa-car',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Electronics',
                'name_ar' => 'الإلكترونيات',
                'slug' => 'electronics',
                'description_en' => 'Computers, phones, cameras, and other electronic devices',
                'description_ar' => 'أجهزة الكمبيوتر، الهواتف، الكاميرات، والأجهزة الإلكترونية الأخرى',
                'icon' => 'fa-laptop',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Tools & Equipment',
                'name_ar' => 'الأدوات والمعدات',
                'slug' => 'tools-equipment',
                'description_en' => 'Power tools, construction equipment, and garden tools',
                'description_ar' => 'الأدوات الكهربائية، معدات البناء، وأدوات الحدائق',
                'icon' => 'fa-tools',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_en' => 'Party & Events',
                'name_ar' => 'الاحتفالات والفعاليات',
                'slug' => 'party-events',
                'description_en' => 'Party supplies, event equipment, and decorations',
                'description_ar' => 'مستلزمات الحفلات، معدات الفعاليات، والديكورات',
                'icon' => 'fa-gift',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_en' => 'Sports & Recreation',
                'name_ar' => 'الرياضة والترفيه',
                'slug' => 'sports-recreation',
                'description_en' => 'Sports equipment, bikes, and recreational items',
                'description_ar' => 'المعدات الرياضية، الدراجات، والعناصر الترفيهية',
                'icon' => 'fa-football-ball',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name_en' => 'Home & Garden',
                'name_ar' => 'المنزل والحديقة',
                'slug' => 'home-garden',
                'description_en' => 'Furniture, appliances, and garden supplies',
                'description_ar' => 'الأثاث، الأجهزة المنزلية، ومستلزمات الحدائق',
                'icon' => 'fa-home',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
