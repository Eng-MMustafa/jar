@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')
@section('page-description', 'Update category information and settings.')

@section('page-actions')
    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Categories
    </a>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                    <input type="text" name="name" value="{{ $category->name }}" required
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" required
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Parent Category</label>
                    <select name="parent_id"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">None (Root Category)</option>
                        @if(isset($categories))
                            @foreach($categories as $cat)
                                @if($cat->parent_id == null && $cat->id != $category->id)
                                    <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                    @error('parent_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $category->sort_order ?? 0 }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">{{ $category->description }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Icon & Media -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Icon & Media</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <input type="text" name="icon" value="{{ $category->icon }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                           placeholder="fas fa-camera">
                    <p class="mt-1 text-sm text-gray-500">Enter Font Awesome icon class (e.g., fas fa-camera)</p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Category Image</label>
                    @if($category->image)
                        <div class="flex items-center space-x-4">
                            <img class="h-20 w-20 object-cover rounded-lg" src="{{ asset('storage/' . $category->image) }}" alt="Category image">
                            <div>
                                <p class="text-sm text-gray-600">Current image</p>
                                <button type="button" class="text-sm text-red-600 hover:text-red-700">Remove current image</button>
                            </div>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No image uploaded</p>
                    @endif
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Category Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                    <input type="color" name="color" value="{{ $category->color ?? '#3B82F6' }}"
                           class="w-full h-10 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="mt-1 text-sm text-gray-500">Category color for UI elements</p>
                    @error('color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                           placeholder="SEO meta title">
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">{{ $category->meta_description }}</textarea>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                           placeholder="keyword1, keyword2, keyword3">
                    @error('meta_keywords')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Status & Visibility -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Status & Visibility</h3>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" {{ $category->is_active ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Active (Category will be visible to customers)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" {{ $category->is_featured ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                        Featured (Show in featured categories section)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="show_in_menu" id="show_in_menu" {{ $category->show_in_menu ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="show_in_menu" class="ml-2 block text-sm text-gray-900">
                        Show in Navigation Menu
                    </label>
                </div>
            </div>
        </div>

        <!-- Category Settings -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Category Settings</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Products per Page</label>
                    <input type="number" name="products_per_page" value="{{ $category->products_per_page ?? 12 }}" min="1" max="100"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('products_per_page')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Rental Duration (days)</label>
                    <input type="number" name="min_rental_duration" value="{{ $category->min_rental_duration ?? 1 }}" min="1"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('min_rental_duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Maximum Rental Duration (days)</label>
                    <input type="number" name="max_rental_duration" value="{{ $category->max_rental_duration ?? 30 }}" min="1"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('max_rental_duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Security Deposit Percentage (%)</label>
                    <input type="number" name="security_deposit_percentage" value="{{ $category->security_deposit_percentage ?? 20 }}" min="0" max="100" step="0.1"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('security_deposit_percentage')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Category Statistics -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Category Statistics</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $category->products ? $category->products->count() : 0 }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Active Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $category->activeProducts ? $category->activeProducts->count() : 0 }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Subcategories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $category->children ? $category->children->count() : 0 }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $category->totalOrders ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-between">
            <div class="space-x-4">
                @if($category->is_active)
                    <form method="POST" action="{{ route('admin.categories.disable', $category->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to disable this category?')">
                            <i class="fas fa-pause mr-2"></i>
                            Disable Category
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('admin.categories.enable', $category->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors duration-200">
                            <i class="fas fa-play mr-2"></i>
                            Enable Category
                        </button>
                    </form>
                @endif
                
                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-200"
                            onclick="return confirm('Are you sure you want to delete this category? This will also delete all subcategories and cannot be undone.')">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Category
                    </button>
                </form>
            </div>
            
            <div class="space-x-4">
                <a href="{{ route('admin.categories.index') }}" 
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-primary-600 text-white px-6 py-2 rounded-md hover:bg-primary-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update Category
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
