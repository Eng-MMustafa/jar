<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::withTrashed()
            ->with(['createdBy', 'updatedBy'])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'link_target' => 'required|in:_self,_blank',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $request->image,
            'link' => $request->link,
            'link_target' => $request->link_target,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->integer('sort_order', 0),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_by' => auth()->guard('admin')->id(),
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'link_target' => 'required|in:_self,_blank',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $slider->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $request->image,
            'link' => $request->link,
            'link_target' => $request->link_target,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->integer('sort_order', 0),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'updated_by' => auth()->guard('admin')->id(),
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function activate(Slider $slider)
    {
        $slider->update(['is_active' => true]);
        
        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider activated successfully.');
    }

    public function deactivate(Slider $slider)
    {
        $slider->update(['is_active' => false]);
        
        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider deactivated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        
        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }

    public function restore($id)
    {
        $slider = Slider::withTrashed()->findOrFail($id);
        $slider->restore();
        
        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider restored successfully.');
    }
}
