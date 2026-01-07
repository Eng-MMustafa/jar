@extends('admin.layouts.app')

@section('title', 'Edit Slider')
@section('page-title', 'Edit Slider')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm text-gray-700">Title</label>
                <input name="title" value="{{ $slider->title }}" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm text-gray-700">Subtitle</label>
                <input name="subtitle" value="{{ $slider->subtitle }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700">Image URL</label>
                <input name="image" value="{{ $slider->image }}" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700">Link</label>
                    <input name="link" value="{{ $slider->link }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Link Target</label>
                    <select name="link_target" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="_self" {{ $slider->link_target == '_self' ? 'selected' : '' }}>Same Tab</option>
                        <option value="_blank" {{ $slider->link_target == '_blank' ? 'selected' : '' }}>New Tab</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div>
                    <label class="block text-sm text-gray-700">Active</label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $slider->sort_order }}" class="w-24 border border-gray-300 rounded-md px-2 py-1">
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.sliders.index') }}" class="mr-3 text-gray-600">Cancel</a>
                <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
