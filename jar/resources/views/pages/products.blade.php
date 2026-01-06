@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-white py-8">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">المنتجات</h1>
            @if(auth()->user()->is_admin || auth()->user()->is_seller)
            <a href="{{ route('my-products.index') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg">
                إضافة منتج جديد
            </a>
            @endif
        </div>

        <!-- Quick Filters -->
        <div class="flex gap-2 mb-8 flex-wrap">
            <input type="text" placeholder="ابحث عن منتج..." class="px-4 py-2 border border-gray-300 rounded-lg flex-1 min-w-48 focus:outline-none focus:ring-2 focus:ring-teal-600">
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                <option value="">الفئة</option>
                <option value="1">إيجارات</option>
                <option value="2">خدمات</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <!-- Product Image -->
                <div class="bg-gray-200 h-40 overflow-hidden">
                    <img src="{{ asset('images/placeholder.svg') }}" alt="Product" class="w-full h-full object-cover">
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 text-base mb-1">عرارة للإيجار</h3>
                    <p class="text-sm text-gray-600 mb-3">مناسب للعائلات</p>

                    <div class="flex justify-between items-center">
                        <span class="text-teal-600 font-bold">ر.س 120</span>
                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-1 rounded text-sm transition-colors">
                            عرض
                        </button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection
