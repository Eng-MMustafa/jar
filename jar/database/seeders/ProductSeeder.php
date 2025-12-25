<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $lenders = User::where('type', 'lender')->get();
        $categories = Category::all();

        $productNames = [
            'Toyota Camry 2022',
            'Honda Civic 2021',
            'iPhone 14 Pro',
            'Samsung Galaxy S23',
            'MacBook Pro 16"',
            'Dell XPS 13',
            'Canon EOS R5',
            'Sony A7 IV',
            'Power Drill Set',
            'Circular Saw',
            'Party Tent 10x20',
            'Sound System 500W',
            'Mountain Bike',
            'Road Bike',
            'Treadmill Electric',
            'Gaming Chair',
            'Dining Table Set',
            'Sofa 3-Seater',
            'Refrigerator LG',
            'Washing Machine Samsung',
        ];

        foreach ($productNames as $index => $productName) {
            $lender = $lenders->random();
            $category = $categories->random();
            
            Product::create([
                'user_id' => $lender->id,
                'category_id' => $category->id,
                'name' => $productName,
                'slug' => strtolower(str_replace(' ', '-', $productName)),
                'description' => "High quality {$productName} available for rent. Well maintained and in excellent condition.",
                'price' => rand(50, 500),
                'rental_price_daily' => rand(50, 500),
                'rental_price_weekly' => rand(200, 2000),
                'rental_price_monthly' => rand(800, 6000),
                'sku' => 'SKU-' . strtoupper(uniqid()),
                'stock_quantity' => rand(1, 10),
                'min_stock_level' => 1,
                'is_active' => true,
                'is_featured' => rand(0, 1),
                'is_rentable' => true,
            ]);
        }

        // Create some inactive products
        $lender = $lenders->first();
        Product::create([
            'user_id' => $lender->id,
            'category_id' => $categories->first()->id,
            'name' => 'Inactive Product',
            'slug' => 'inactive-product',
            'description' => 'This product is inactive',
            'price' => 100,
            'sku' => 'SKU-' . strtoupper(uniqid()),
            'stock_quantity' => 1,
            'min_stock_level' => 1,
            'is_active' => false,
            'is_featured' => false,
            'is_rentable' => true,
        ]);
    }
}
