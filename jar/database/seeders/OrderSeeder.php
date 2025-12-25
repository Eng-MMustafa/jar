<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $renters = User::where('type', 'renter')->get();
        $products = Product::where('is_active', true)->get();

        $statuses = ['pending', 'confirmed', 'active', 'completed', 'cancelled'];

        foreach ($renters as $renter) {
            // Create 2-5 orders per renter
            for ($i = 0; $i < rand(2, 5); $i++) {
                $product = $products->random();
                $status = $statuses[array_rand($statuses)];
                
                $startDate = now()->subDays(rand(1, 30));
                $endDate = $startDate->copy()->addDays(rand(1, 14));
                $rentalDays = $startDate->diffInDays($endDate);
                
                $order = Order::create([
                    'user_id' => $renter->id,
                    'product_id' => $product->id,
                    'lender_id' => $product->user_id,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'rental_days' => $rentalDays,
                    'total_amount' => $product->price_per_day * $rentalDays,
                    'status' => $status,
                    'notes' => "Order notes for order #{$i}",
                    'rating' => $status === 'completed' ? rand(3, 5) : null,
                    'review' => $status === 'completed' ? "Great experience renting this {$product->title}!" : null,
                ]);

                // Set timestamps based on status
                if ($status === 'confirmed') {
                    $order->confirmed_at = $startDate->copy()->addHours(rand(1, 24));
                } elseif ($status === 'active') {
                    $order->confirmed_at = $startDate->copy()->addHours(rand(1, 24));
                    $order->started_at = $startDate;
                } elseif ($status === 'completed') {
                    $order->confirmed_at = $startDate->copy()->addHours(rand(1, 24));
                    $order->started_at = $startDate;
                    $order->completed_at = $endDate;
                } elseif ($status === 'cancelled') {
                    $order->cancelled_at = $startDate->copy()->addDays(rand(1, 5));
                }

                $order->save();
            }
        }

        // Create some recent pending orders
        for ($i = 0; $i < 5; $i++) {
            $product = $products->random();
            $renter = $renters->random();
            
            Order::create([
                'user_id' => $renter->id,
                'product_id' => $product->id,
                'lender_id' => $product->user_id,
                'start_date' => now()->addDays(rand(1, 7)),
                'end_date' => now()->addDays(rand(8, 21)),
                'rental_days' => rand(7, 14),
                'total_amount' => $product->price_per_day * 10,
                'status' => 'pending',
                'notes' => "New pending order",
            ]);
        }
    }
}
