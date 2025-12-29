@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <img src="{{ $product->images->first()->image_path ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-md">
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-6">{{ $product->description }}</p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">أسعار التأجير</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <p class="text-sm text-gray-600">يومي</p>
                            <p class="text-2xl font-bold text-blue-600">${{ $product->rental_price_daily }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <p class="text-sm text-gray-600">أسبوعي</p>
                            <p class="text-2xl font-bold text-blue-600">${{ $product->rental_price_weekly }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <p class="text-sm text-gray-600">شهري</p>
                            <p class="text-2xl font-bold text-blue-600">${{ $product->rental_price_monthly }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">تفاصيل المنتج</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><strong>الفئة:</strong> {{ $product->category->name }}</li>
                        <li><strong>رمز المنتج:</strong> {{ $product->sku }}</li>
                        <li><strong>المخزون:</strong> {{ $product->stock_quantity }}</li>
                        <li><strong>التقييم:</strong> {{ $product->rating }} ({{ $product->reviews_count }} تقييمات)</li>
                    </ul>
                </div>

                <div class="flex space-x-4">
                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex space-x-2">
                        @csrf
                        <select name="rental_period" class="border border-gray-300 rounded-md px-3 py-2">
                            <option value="daily">يومي</option>
                            <option value="weekly">أسبوعي</option>
                            <option value="monthly">شهري</option>
                        </select>
                        <input type="number" name="quantity" value="1" min="1" class="border border-gray-300 rounded-md px-3 py-2 w-20">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700">إضافة إلى السلة</button>
                    </form>
                    <button class="bg-gray-200 text-gray-800 px-6 py-3 rounded-md hover:bg-gray-300">إضافة إلى المفضلة</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection