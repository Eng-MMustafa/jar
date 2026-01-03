<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->withCount('activeProducts')
            ->orderBy('sort_order')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show($slug, Request $request)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $query = Product::with('images', 'user')
            ->where('category_id', $category->id)
            ->where('is_active', true);

        // البحث
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // تصفية السعر
        if ($request->has('min_price') && $request->min_price) {
            $query->where('rental_price_daily', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('rental_price_daily', '<=', $request->max_price);
        }

        // تصفية التقييم
        if ($request->has('rating') && $request->rating) {
            $query->where('rating', '>=', $request->rating);
        }

        // تصفية نوع الإيجار
        if ($request->has('rental_type') && $request->rental_type) {
            $rentalType = $request->rental_type;
            if ($rentalType == 'daily') {
                $query->where('rental_price_daily', '>', 0);
            } elseif ($rentalType == 'weekly') {
                $query->where('rental_price_weekly', '>', 0);
            } elseif ($rentalType == 'monthly') {
                $query->where('rental_price_monthly', '>', 0);
            }
        }

        $products = $query->paginate(12);

        return view('categories.show', compact('category', 'products'));
    }
}