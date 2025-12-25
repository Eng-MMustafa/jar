@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')
@section('page-description', 'Update product information and settings.')

@section('page-actions')
    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Products
    </a>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                    <input type="text" name="name" value="{{ $product->name }}" required
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                    <input type="text" name="sku" value="{{ $product->sku }}" required
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('sku')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Owner *</label>
                    <select name="user_id" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select owner</option>
                        @if($product->user)
                            <option value="{{ $product->user_id }}" selected>
                                {{ $product->user->first_name }} {{ $product->user->last_name }}
                            </option>
                        @endif
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">{{ $product->description }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Pricing -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Pricing</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Daily Price ($) *</label>
                    <input type="number" name="rental_price_daily" value="{{ $product->rental_price_daily }}" required step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('rental_price_daily')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weekly Price ($)</label>
                    <input type="number" name="rental_price_weekly" value="{{ $product->rental_price_weekly }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('rental_price_weekly')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Monthly Price ($)</label>
                    <input type="number" name="rental_price_monthly" value="{{ $product->rental_price_monthly }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('rental_price_monthly')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deposit Amount ($)</label>
                    <input type="number" name="deposit_amount" value="{{ $product->deposit_amount }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('deposit_amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Late Fee per Day ($)</label>
                    <input type="number" name="late_fee_per_day" value="{{ $product->late_fee_per_day }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('late_fee_per_day')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Inventory -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Inventory</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                    <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" required min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('stock_quantity')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Low Stock Threshold</label>
                    <input type="number" name="low_stock_threshold" value="{{ $product->low_stock_threshold }}" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('low_stock_threshold')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Rental Period (days)</label>
                    <input type="number" name="min_rental_period" value="{{ $product->min_rental_period }}" min="1"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('min_rental_period')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Maximum Rental Period (days)</label>
                    <input type="number" name="max_rental_period" value="{{ $product->max_rental_period }}" min="1"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @error('max_rental_period')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Media -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Media</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Product Image</label>
                    @if($product->image)
                        <div class="flex items-center space-x-4">
                            <img class="h-20 w-20 object-cover rounded-lg" src="{{ asset('storage/' . $product->image) }}" alt="Product image">
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
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Product Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                    <input type="file" name="gallery_images[]" accept="image/*" multiple
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="mt-1 text-sm text-gray-500">Upload additional images (optional)</p>
                </div>
            </div>
        </div>

        <!-- Status & Visibility -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Status & Visibility</h3>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" {{ $product->is_active ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Active (Product will be visible to customers)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" {{ $product->is_featured ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                        Featured (Show in featured products section)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="requires_insurance" id="requires_insurance" {{ $product->requires_insurance ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="requires_insurance" class="ml-2 block text-sm text-gray-900">
                        Requires Insurance (Customer must purchase insurance)
                    </label>
                </div>
            </div>
        </div>

        <!-- Specifications -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Specifications</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                    <input type="number" name="weight" value="{{ $product->weight }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dimensions (L x W x H cm)</label>
                    <div class="grid grid-cols-3 gap-4">
                        <input type="number" name="length" value="{{ $product->length }}" step="0.01" min="0"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="Length">
                        <input type="number" name="width" value="{{ $product->width }}" step="0.01" min="0"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="Width">
                        <input type="number" name="height" value="{{ $product->height }}" step="0.01" min="0"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="Height">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input type="text" name="tags" value="{{ $product->tags }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                           placeholder="Enter tags separated by commas">
                    <p class="mt-1 text-sm text-gray-500">e.g., camera, electronics, professional</p>
                </div>
            </div>
        </div>

        <!-- Product Statistics -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Product Statistics</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $product->orders ? $product->orders->count() : 0 }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Active Rentals</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $product->activeRentals ? $product->activeRentals->count() : 0 }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($product->totalRevenue ?? 0, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Average Rating</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $product->averageRating ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-between">
            <div class="space-x-4">
                @if($product->is_active)
                    <form method="POST" action="{{ route('admin.products.deactivate', $product->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to deactivate this product?')">
                            <i class="fas fa-pause mr-2"></i>
                            Deactivate Product
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('admin.products.activate', $product->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors duration-200">
                            <i class="fas fa-play mr-2"></i>
                            Activate Product
                        </button>
                    </form>
                @endif
                
                @if(!$product->is_featured)
                    <form method="POST" action="{{ route('admin.products.feature', $product->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-star mr-2"></i>
                            Feature Product
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('admin.products.unfeature', $product->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-colors duration-200">
                            <i class="fas fa-star-o mr-2"></i>
                            Unfeature Product
                        </button>
                    </form>
                @endif
                
                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-200"
                            onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Product
                    </button>
                </form>
            </div>
            
            <div class="space-x-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-primary-600 text-white px-6 py-2 rounded-md hover:bg-primary-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update Product
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
