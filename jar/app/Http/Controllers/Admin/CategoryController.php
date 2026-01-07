<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->search, function ($q) use ($request) {
                $term = '%'.$request->search.'%';
                $q->where(function($qq) use ($term) {
                    $qq->where('name_en', 'like', $term)
                       ->orWhere('name_ar', 'like', $term);
                });
            })
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Category Store Start', [
            'method' => $request->method(),
            'all' => $request->all(),
            'files' => $request->allFiles(),
        ]);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        // Generate slug from name if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $request->input('sort_order', 0);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image_url'] = $path;
        }
        unset($data['image']);

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        \Illuminate\Support\Facades\Log::info('Category Update Start', [
            'id' => $category->id,
            'method' => $request->method(),
            'all' => $request->all(),
            'files' => $request->allFiles(),
        ]);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,'.$category->id,
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $request->input('sort_order', 0);

        // Handle image upload and delete old image if replacing
        if ($request->hasFile('image')) {
            if ($category->getRawOriginal('image_url')) {
                try { Storage::disk('public')->delete($category->getRawOriginal('image_url')); } catch (\Exception $e) {}
            }
            $path = $request->file('image')->store('categories', 'public');
            $data['image_url'] = $path;
        }
        unset($data['image']);

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // delete image file if exists
        if ($category->getRawOriginal('image_url')) {
            try { Storage::disk('public')->delete($category->getRawOriginal('image_url')); } catch (\Exception $e) {}
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    public function toggle(Request $request, Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->save();

        if ($request->wantsJson()) {
            return response()->json(['is_active' => $category->is_active]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'تم بنجاح');
    }
}

