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

        // Featured / "أكثر قيمة" -> "قريبين منكم" (Products in Al-Qassim)
        $featuredProducts = Product::with('images','category')
            ->active()
            ->where(function($q) {
                $q->where('city', 'LIKE', '%القصيم%')
                  ->orWhere('city', 'LIKE', '%Qassim%')
                  ->orWhere('city', 'LIKE', '%Buraydah%')
                  ->orWhere('city', 'LIKE', '%بريدة%');
            })
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Fallback if no specific Qassim products found
        if ($featuredProducts->isEmpty()) {
             $featuredProducts = Product::with('images','category')->active()->inRandomOrder()->take(3)->get();
        }

        // Active categories for slider
        $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('home', compact('mostRented', 'featuredProducts', 'categories'));
    }
}
