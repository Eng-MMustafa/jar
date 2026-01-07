@extends('admin.layouts.app')

@section('title', 'Create Slider')
@section('page-title', 'Create Slider')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <form action="{{ route('admin.sliders.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm text-gray-700">Title</label>
                <input name="title" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm text-gray-700">Subtitle</label>
                <input name="subtitle" class="w-full border border-gray-300 rounded-md px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700">Image URL</label>
                <input name="image" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700">Link</label>
                    <input name="link" class="w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Link Target</label>
                    <select name="link_target" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="_self">Same Tab</option>
                        <option value="_blank">New Tab</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div>
                    <label class="block text-sm text-gray-700">Active</label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked>
                </div>
                <div>
                    <label class="block text-sm text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-24 border border-gray-300 rounded-md px-2 py-1">
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.sliders.index') }}" class="mr-3 text-gray-600">Cancel</a>
                <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-md">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
