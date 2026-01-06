<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Latest 3 active products by default. Pass ?random=1 to show 3 random products.
        $query = Product::with('images','category')->active();

        if (request()->boolean('random')) {
            $mostRented = $query->inRandomOrder()->take(3)->get();
        } else {
            $mostRented = $query->orderByDesc('created_at')->take(3)->get();
        }

        // Featured / "أكثر قيمة": 4 random active products
        $featuredProducts = Product::with('images','category')->active()->inRandomOrder()->take(4)->get();

        // Active categories for slider
        $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('home', compact('mostRented', 'featuredProducts', 'categories'));
    }
} 
