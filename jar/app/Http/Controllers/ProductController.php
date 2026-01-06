<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category', 'user', 'images')->where('is_active', true);

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::with('category', 'user', 'images')->where('slug', $slug)->firstOrFail();

        $isFavorited = false;
        $hasRated = false;
        if (auth()->check()) {
            $isFavorited = auth()->user()->favorites()->where('product_id', $product->id)->exists();
            $hasRated = \App\Models\Comment::where('product_id', $product->id)
                ->where('user_id', auth()->id())
                ->whereNotNull('rating')
                ->exists();
        }

        // Owner / lender info (counts computed from DB)
        $owner = $product->user;
        $ownerProductsCount = $owner ? $owner->products()->count() : 0;
        $ownerRentalsCount = \App\Models\OrderItem::whereHas('product', function($q) use ($owner) {
            if (! $owner) return;
            $q->where('user_id', $owner->id);
        })->count();

        return view('products.show', compact('product', 'isFavorited', 'hasRated', 'owner', 'ownerProductsCount', 'ownerRentalsCount'));

    }

    /**
     * Toggle favorite (auth required)
     */
    public function toggleFavorite(Request $request, Product $product)
    {
        if (! auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        if ($user->favorites()->where('product_id', $product->id)->exists()) {
            $user->favorites()->detach($product->id);
            $favorited = false;
        } else {
            $user->favorites()->attach($product->id);
            $favorited = true;
        }

        return response()->json(['favorited' => $favorited]);
    }
}
