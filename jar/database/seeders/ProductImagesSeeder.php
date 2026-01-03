<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        // قائمة الصور المتاحة في المجلد
        $images = [
            'image 4.png',
            'image 6.png',
            'image 17.png',
            'image 18.png',
            'image 19.png',
            'Image-1.png',
            'Image-2.png',
            'Image-4.png',
            'Image-5.png',
            'Image.png',
        ];

        // الحصول على جميع المنتجات
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command->warn('لا توجد منتجات! يرجى تشغيل CategoriesAndProductsSeeder أولاً');
            return;
        }

        $imageIndex = 0;

        // إضافة صور لكل منتج
        foreach ($products as $product) {
            // إضافة صورة واحدة على الأقل لكل منتج
            if (isset($images[$imageIndex])) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'images/Images/' . $images[$imageIndex],
                    'alt_text' => $product->name,
                    'is_primary' => true,
                    'sort_order' => 1,
                ]);

                // إضافة صورة ثانية للمنتجات الأولى
                if ($imageIndex + 1 < count($images)) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => 'images/Images/' . $images[($imageIndex + 1) % count($images)],
                        'alt_text' => $product->name . ' - صورة إضافية',
                        'is_primary' => false,
                        'sort_order' => 2,
                    ]);
                }

                $imageIndex = ($imageIndex + 2) % count($images);
            }
        }

        $this->command->info('تم إضافة الصور للمنتجات بنجاح!');
    }
}
