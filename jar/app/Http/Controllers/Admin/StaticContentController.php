<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticContent;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index(Request $request)
    {
        $contents = StaticContent::withTrashed()
            ->with(['createdBy', 'updatedBy'])
            ->when($request->search, function($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                      ->orWhere('slug', 'like', '%' . $request->search . '%');
            })
            ->when($request->type, function($query) use ($request) {
                $query->where('type', $request->type);
            })
            ->latest()
            ->paginate(15);

        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:static_contents',
            'content' => 'required|string',
            'type' => 'required|in:page,section,footer,header',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        StaticContent::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'type' => $request->type,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_active' => $request->boolean('is_active', true),
            'created_by' => auth()->guard('admin')->id(),
        ]);

        return redirect()->route('admin.content.index')
            ->with('success', 'Content created successfully.');
    }

    public function edit(StaticContent $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, StaticContent $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:static_contents,slug,' . $content->id,
            'content' => 'required|string',
            'type' => 'required|in:page,section,footer,header',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        $content->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'type' => $request->type,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_active' => $request->boolean('is_active', true),
            'updated_by' => auth()->guard('admin')->id(),
        ]);

        return redirect()->route('admin.content.index')
            ->with('success', 'Content updated successfully.');
    }

    public function activate(StaticContent $content)
    {
        $content->update(['is_active' => true]);
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content activated successfully.');
    }

    public function deactivate(StaticContent $content)
    {
        $content->update(['is_active' => false]);
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content deactivated successfully.');
    }

    public function destroy(StaticContent $content)
    {
        $content->delete();
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content deleted successfully.');
    }

    public function restore($id)
    {
        $content = StaticContent::withTrashed()->findOrFail($id);
        $content->restore();
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content restored successfully.');
    }
}
