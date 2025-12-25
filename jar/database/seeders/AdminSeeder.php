<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@jart.com',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // Create Regular Admin
        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@jart.com',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // Create Support Admin
        Admin::create([
            'name' => 'Support Admin',
            'email' => 'support@jart.com',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);
    }
}
