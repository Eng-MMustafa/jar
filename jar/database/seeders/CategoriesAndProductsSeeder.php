<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesAndProductsSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء مستخدم تجريبي للمنتجات
        $testUser = User::firstOrCreate(
            ['email' => 'testuser@example.com'],
            [
                'first_name' => 'مستخدم',
                'last_name' => 'تجريبي',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'is_active' => true,
                'is_verified' => true,
            ]
        );

        // إنشاء الأقسام
        $categories = [
            [
                'name_en' => 'Camping Equipment',
                'name_ar' => 'معدات التخييم',
                'slug' => 'camping-equipment',
                'description_ar' => 'جميع المعدات اللازمة لرحلات التخييم والاستكشاف',
                'icon' => 'fas fa-campground',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Electronics',
                'name_ar' => 'الإلكترونيات',
                'slug' => 'electronics',
                'description_ar' => 'أحدث الأجهزة الإلكترونية والتقنية',
                'icon' => 'fas fa-laptop',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Outdoor Gear',
                'name_ar' => 'معدات خارجية',
                'slug' => 'outdoor-gear',
                'description_ar' => 'معدات للأنشطة الخارجية والرياضة',
                'icon' => 'fas fa-hiking',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']], 
                $categoryData
            );
        }

        // إنشاء منتجات تجريبية
        $campingCategory = Category::where('slug', 'camping-equipment')->first();
        $electronicsCategory = Category::where('slug', 'electronics')->first();
        $outdoorCategory = Category::where('slug', 'outdoor-gear')->first();

        $products = [
            // معدات التخييم
            [
                'user_id' => $testUser->id,
                'category_id' => $campingCategory->id,
                'name' => 'خيمة مناسبة للرحلات',
                'slug' => 'camping-tent',
                'description' => 'خيمة قوية وواسعة مناسبة للرحلات والتخييم، مقاومة للرياح والمطر',
                'price' => 800.00,
                'rental_price_daily' => 30.00,
                'rental_price_weekly' => 180.00,
                'rental_price_monthly' => 600.00,
                'sku' => 'TENT-001',
                'stock_quantity' => 5,
                'is_active' => true,
                'is_featured' => true,
                'is_rentable' => true,
                'rating' => 4.3,
                'reviews_count' => 15,
            ],
            [
                'user_id' => $testUser->id,
                'category_id' => $campingCategory->id,
                'name' => 'عُدة للاستخدام الخارجي والتخييم',
                'slug' => 'camping-kit',
                'description' => 'عُدة شاملة تتضمن جميع الأدوات الأساسية للتخييم والاستكشاف',
                'price' => 1200.00,
                'rental_price_daily' => 50.00,
                'rental_price_weekly' => 300.00,
                'rental_price_monthly' => 1000.00,
                'sku' => 'KIT-001',
                'stock_quantity' => 3,
                'is_active' => true,
                'is_featured' => true,
                'is_rentable' => true,
                'rating' => 4.2,
                'reviews_count' => 8,
            ],
            // الإلكترونيات
            [
                'user_id' => $testUser->id,
                'category_id' => $electronicsCategory->id,
                'name' => 'جهاز بلاي ستيشن 5',
                'slug' => 'playstation-5',
                'description' => 'جهاز ألعاب سوني بلاي ستيشن 5 مع أحدث الألعاب والتقنيات',
                'price' => 2500.00,
                'rental_price_daily' => 120.00,
                'rental_price_weekly' => 700.00,
                'rental_price_monthly' => 2000.00,
                'sku' => 'PS5-001',
                'stock_quantity' => 2,
                'is_active' => true,
                'is_featured' => true,
                'is_rentable' => true,
                'rating' => 4.5,
                'reviews_count' => 25,
            ],
            // معدات خارجية أخرى
            [
                'user_id' => $testUser->id,
                'category_id' => $outdoorCategory->id,
                'name' => 'معدات للأنشطة الخارجية',
                'slug' => 'outdoor-equipment',
                'description' => 'مجموعة من المعدات المناسبة للأنشطة الخارجية والرياضة',
                'price' => 600.00,
                'rental_price_daily' => 25.00,
                'rental_price_weekly' => 150.00,
                'rental_price_monthly' => 500.00,
                'sku' => 'OUT-001',
                'stock_quantity' => 4,
                'is_active' => true,
                'is_featured' => false,
                'is_rentable' => true,
                'rating' => 4.0,
                'reviews_count' => 12,
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['slug' => $productData['slug']], 
                $productData
            );
        }

        $this->command->info('تم إنشاء الأقسام والمنتجات التجريبية بنجاح!');
    }
}
