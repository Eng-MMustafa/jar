<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample renters
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'first_name' => "Renter",
                'last_name' => "User {$i}",
                'email' => "renter{$i}@example.com",
                'password' => Hash::make('password'),
                'type' => 'renter',
                'is_active' => true,
                'is_verified' => true,
                'phone' => "+96650000000{$i}",
                'city' => ['Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina'][array_rand(['Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina'])],
                'address' => "Address {$i}, City",
                'rating' => rand(3.5, 5.0),
                'reviews_count' => rand(1, 20),
            ]);
        }

        // Create sample lenders
        for ($i = 1; $i <= 8; $i++) {
            User::create([
                'first_name' => "Lender",
                'last_name' => "User {$i}",
                'email' => "lender{$i}@example.com",
                'password' => Hash::make('password'),
                'type' => 'lender',
                'is_active' => true,
                'is_verified' => true,
                'phone' => "+96650000010{$i}",
                'city' => ['Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina'][array_rand(['Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina'])],
                'address' => "Address {$i}, City",
                'rating' => rand(3.5, 5.0),
                'reviews_count' => rand(1, 20),
            ]);
        }

        // Create some inactive users
        User::create([
            'first_name' => 'Inactive',
            'last_name' => 'User',
            'email' => 'inactive@example.com',
            'password' => Hash::make('password'),
            'type' => 'renter',
            'is_active' => false,
            'is_verified' => false,
            'phone' => '+96670000002',
            'city' => 'Jeddah',
        ]);
    }
}
