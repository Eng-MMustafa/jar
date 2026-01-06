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

        return view('home', compact('mostRented'));
    }
}
