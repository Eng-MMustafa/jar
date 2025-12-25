<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::withTrashed()
            ->with(['category', 'user'])
            ->when($request->search, function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('description', 'like', '%' . $request->search . '%');
            })
            ->when($request->category_id, function($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->when($request->status, function($query) use ($request) {
                if ($request->status === 'active') {
                    $query->active();
                } elseif ($request->status === 'inactive') {
                    $query->where('is_active', false);
                } elseif ($request->status === 'featured') {
                    $query->featured();
                } elseif ($request->status === 'low-stock') {
                    $query->lowStock();
                }
            })
            ->latest()
            ->paginate(15);

        $categories = Category::active()->bySortOrder()->get();
        
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'user', 'orderItems']);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::active()->bySortOrder()->get();
        $users = User::lenders()->active()->get();
        return view('admin.products.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rental_price_daily' => 'nullable|numeric|min:0',
            'rental_price_weekly' => 'nullable|numeric|min:0',
            'rental_price_monthly' => 'nullable|numeric|min:0',
            'sku' => 'required|string|max:255|unique:products',
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_rentable' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'rental_price_daily' => $request->rental_price_daily,
            'rental_price_weekly' => $request->rental_price_weekly,
            'rental_price_monthly' => $request->rental_price_monthly,
            'sku' => $request->sku,
            'stock_quantity' => $request->stock_quantity,
            'min_stock_level' => $request->min_stock_level,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
            'is_rentable' => $request->boolean('is_rentable', false),
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'rating' => 0,
            'reviews_count' => 0,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $users = User::where('type', 'lender')->get();
        return view('admin.products.edit', compact('product', 'categories', 'users'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rental_price_daily' => 'nullable|numeric|min:0',
            'rental_price_weekly' => 'nullable|numeric|min:0',
            'rental_price_monthly' => 'nullable|numeric|min:0',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_rentable' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'rental_price_daily' => $request->rental_price_daily,
            'rental_price_weekly' => $request->rental_price_weekly,
            'rental_price_monthly' => $request->rental_price_monthly,
            'sku' => $request->sku,
            'stock_quantity' => $request->stock_quantity,
            'min_stock_level' => $request->min_stock_level,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
            'is_rentable' => $request->boolean('is_rentable', false),
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function activate(Product $product)
    {
        $product->update(['is_active' => true]);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product activated successfully.');
    }

    public function deactivate(Product $product)
    {
        $product->update(['is_active' => false]);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deactivated successfully.');
    }

    public function feature(Product $product)
    {
        $product->update(['is_featured' => true]);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product featured successfully.');
    }

    public function unfeature(Product $product)
    {
        $product->update(['is_featured' => false]);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product unfeatured successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product restored successfully.');
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->forceDelete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product permanently deleted.');
    }
}
