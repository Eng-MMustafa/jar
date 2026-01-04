@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">طلبات الإيجار الجديدة</h1>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex gap-3 overflow-x-auto pb-2">
                <button class="px-4 py-2 bg-teal-600 text-white rounded-lg text-sm font-medium whitespace-nowrap">جميع الطلبات</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">موافق عليها</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">قيد الانتظار</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">مرفوضة</button>
            </div>
        </div>
    </div>

    <!-- Orders List -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-4">
            @for ($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow overflow-hidden">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex justify-between items-start mb-4 pb-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">عرارة للإيجار اليومي</h3>
                            <p class="text-sm text-gray-600 mt-1">رقم الطلب: <span class="font-medium">#98873</span></p>
                        </div>
                        @if($i % 3 == 0)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">موافق عليه</span>
                        @elseif($i % 3 == 1)
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">قيد الانتظار</span>
                        @else
                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">مرفوض</span>
                        @endif
                    </div>

                    <!-- Details Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        <!-- Dates -->
                        <div>
                            <p class="text-xs text-gray-500 mb-1">التواريخ</p>
                            <p class="text-sm font-medium text-gray-900">من 28 - 12 - 2025</p>
                            <p class="text-sm font-medium text-gray-900">إلى 28 - 12 - 2025</p>
                        </div>

                        <!-- Tenant -->
                        <div>
                            <p class="text-xs text-gray-500 mb-1">المستأجر</p>
                            <div class="flex items-center gap-2">
                                <img src="https://via.placeholder.com/32" alt="User" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">خالد عبدالله</p>
                                    <p class="text-xs text-gray-500">مستخدم جديد</p>
                                </div>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <p class="text-xs text-gray-500 mb-1">السعر</p>
                            <p class="text-lg font-bold text-teal-600">ر.س 120</p>
                        </div>

                        <!-- Date Applied -->
                        <div>
                            <p class="text-xs text-gray-500 mb-1">تاريخ الطلب</p>
                            <p class="text-sm font-medium text-gray-900">29 يونيو 2024</p>
                            <p class="text-xs text-gray-500">9:22 PM</p>
                        </div>
                    </div>

                    <!-- Messages -->
                    @if($i % 2 == 0)
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                        <p class="text-sm text-green-700">تم قبول طلب الإيجار برقم #98873 بنجاح. سيتم التواصل معك قريباً بخصوص المنتج المضاف.</p>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    @if($i % 3 == 1)
                    <div class="flex gap-3 pt-4 border-t border-gray-200">
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            ✓ موافقة
                        </button>
                        <button class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-medium transition-colors">
                            ✕ رفض
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endfor
        </div>

        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="mt-4 text-gray-600">لا توجد طلبات جديدة حالياً</p>
        </div>
    </div>
</div>
@endsection
