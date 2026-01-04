@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">الإشعارات</h1>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-4 border-b border-gray-200">
                <button class="px-4 py-3 text-gray-900 font-medium border-b-2 border-teal-600">جميع الإشعارات</button>
                <button class="px-4 py-3 text-gray-600 hover:text-gray-900 font-medium border-b-2 border-transparent hover:border-gray-300 transition-colors">لم تقرأ</button>
                <button class="px-4 py-3 text-gray-600 hover:text-gray-900 font-medium border-b-2 border-transparent hover:border-gray-300 transition-colors">طلبات</button>
                <button class="px-4 py-3 text-gray-600 hover:text-gray-900 font-medium border-b-2 border-transparent hover:border-gray-300 transition-colors">رسائل</button>
            </div>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="max-w-3xl mx-auto">
        <div class="divide-y divide-gray-200">
            @for ($i = 0; $i < 8; $i++)
            <div class="bg-white hover:bg-gray-50 transition-colors p-4 sm:p-6 cursor-pointer border-r-4 @if($i % 3 == 0) border-teal-600 bg-teal-50 @else border-transparent @endif">
                <div class="flex gap-4 items-start">
                    <!-- Icon -->
                    <div class="flex-shrink-0">
                        @if($i % 4 == 0)
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        @elseif($i % 4 == 1)
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        @elseif($i % 4 == 2)
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </div>
                        @else
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        @if($i % 4 == 0)
                        <h3 class="font-semibold text-gray-900">طلب إيجار جديد</h3>
                        <p class="text-sm text-gray-600 mt-1">تم استقبال طلب إيجار جديد برقم #98873 من خالد عبدالله</p>
                        @elseif($i % 4 == 1)
                        <h3 class="font-semibold text-gray-900">تم قبول طلبك</h3>
                        <p class="text-sm text-gray-600 mt-1">تم قبول طلب الإيجار الخاص بك بنجاح. سيتم التواصل معك قريباً</p>
                        @elseif($i % 4 == 2)
                        <h3 class="font-semibold text-gray-900">رسالة جديدة</h3>
                        <p class="text-sm text-gray-600 mt-1">لديك رسالة جديدة من خالد عبدالله</p>
                        @else
                        <h3 class="font-semibold text-gray-900">تذكير الدفع</h3>
                        <p class="text-sm text-gray-600 mt-1">يرجى الانتظار حتى تاريخ الدفع المقرر الثلاثاء القادم</p>
                        @endif

                        <p class="text-xs text-gray-500 mt-2">
                            @if($i == 0)
                            منذ دقيقة واحدة
                            @elseif($i == 1)
                            منذ ساعة
                            @elseif($i == 2)
                            منذ 2 ساعة
                            @else
                            منذ يوم واحد
                            @endif
                        </p>
                    </div>

                    <!-- Action -->
                    <div class="flex-shrink-0">
                        @if($i % 3 == 0)
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        @endif
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Empty State -->
        <div class="text-center py-12 bg-white">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <p class="mt-4 text-gray-600">لا توجد إشعارات جديدة</p>
        </div>
    </div>
</div>
@endsection
