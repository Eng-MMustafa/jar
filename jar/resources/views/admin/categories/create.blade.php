@extends('admin.layouts.app')

@section('title', 'Create Category')
@section('page-title', 'Create New Category')

@section('page-actions')
    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Categories
    </a>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="space-y-4 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        @csrf

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <input id="image" type="file" name="image" accept="image/*" class="w-full">
            @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <h2 class="text-lg font-semibold mb-4">Create Category</h2>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-200">
            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mt-3">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug') }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
            <p class="text-xs text-gray-500 mt-1">Optional — generated from English name if left empty.</p>
            @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
                @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4">
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Cancel</a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-md">Create</button>
        </div>
    </form>
</div>
@endsection
