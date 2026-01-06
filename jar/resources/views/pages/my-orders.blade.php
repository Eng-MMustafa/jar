@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900">طلباتى</h1>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">الكل</button>
                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">قيد المعالجة</button>
                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">مكتملة</button>
                    <button class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg text-sm font-medium transition-colors">ملغاة</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders List -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-4">
            @for ($i = 0; $i < 5; $i++)
            <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <!-- Order Number -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">رقم الطلب</p>
                        <p class="font-semibold text-gray-900">#98873</p>
                    </div>

                    <!-- Order Date -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">التاريخ</p>
                        <p class="font-medium text-gray-900">29 يونيو 2024</p>
                    </div>

                    <!-- Total Amount -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">الإجمالي</p>
                        <p class="font-semibold text-teal-600 text-lg">ر.س 120</p>
                    </div>

                    <!-- Status -->
                    <div class="flex justify-end">
                        @if($i % 2 == 0)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">مكتملة</span>
                        @else
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">قيد المعالجة</span>
                        @endif
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                    <div class="flex gap-4 items-start">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="Product" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-900">عرارة للإيجار اليومي</h3>
                            <p class="text-sm text-gray-600 mt-1">من 28 - 12 - 2025 إلى 28 - 12 - 2025</p>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-sm text-gray-700">الكمية: <span class="font-medium">1</span></span>
                                <span class="font-medium text-teal-600">ر.س 120</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4 border-t border-gray-200">
                    <button class="flex-1 bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg font-medium transition-colors">عرض التفاصيل</button>
                    @if($i % 2 != 0)
                    <button class="flex-1 border border-red-300 hover:bg-red-50 text-red-600 py-2 rounded-lg font-medium transition-colors">إلغاء الطلب</button>
                    @endif
                </div>
            </div>
            @endfor
        </div>

        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <p class="mt-4 text-gray-600">لا توجد طلبات حالياً</p>
        </div>
    </div>
</div>
@endsection
