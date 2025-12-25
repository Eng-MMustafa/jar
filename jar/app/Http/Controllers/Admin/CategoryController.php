<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withTrashed()
            ->with('parent')
            ->when($request->search, function($query) use ($request) {
                $query->where('name_en', 'like', '%' . $request->search . '%')
                      ->orWhere('name_ar', 'like', '%' . $request->search . '%')
                      ->orWhere('description_en', 'like', '%' . $request->search . '%')
                      ->orWhere('description_ar', 'like', '%' . $request->search . '%');
            })
            ->withCount(['products', 'activeProducts'])
            ->bySortOrder()
            ->latest()
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::active()->root()->bySortOrder()->get();
        return view('admin.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'slug' => $request->slug,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'icon' => $request->icon,
            'image' => $request->image,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->integer('sort_order', 0),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'slug' => $request->slug,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'icon' => $request->icon,
            'image' => $request->image,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->integer('sort_order', 0),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function enable(Category $category)
    {
        $category->update(['is_active' => true]);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category enabled successfully.');
    }

    public function disable(Category $category)
    {
        $category->update(['is_active' => false]);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category disabled successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category restored successfully.');
    }
}
