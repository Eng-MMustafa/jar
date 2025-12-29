@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">المنتجات</h1>
            <div class="flex space-x-4">
                <form method="GET" class="flex space-x-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="البحث عن المنتجات..." class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <select name="category" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع الفئات</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">بحث</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <img src="{{ $product->images->first()->image_path ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 80) }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-500">يومي: ${{ $product->rental_price_daily }}</span>
                        <span class="text-sm text-gray-500">أسبوعي: ${{ $product->rental_price_weekly }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-600">${{ $product->rental_price_daily }}/يوم</span>
                        <a href="{{ route('products.show', $product->slug) }}" class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm hover:bg-blue-700">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection