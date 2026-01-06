@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">الرسائل</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 h-[600px]">
            <!-- Conversations List -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 border-b border-gray-200">
                    <input type="text" placeholder="ابحث عن محادثة..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 text-sm">
                </div>

                <div class="overflow-y-auto flex-1">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer transition-colors @if($i === 0) bg-teal-50 @endif">
                        <div class="flex gap-3 items-start">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="User" class="w-10 h-10 rounded-full flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center">
                                    <h3 class="font-semibold text-gray-900">خالد عبدالله</h3>
                                    <span class="text-xs text-gray-500">10:30 ص</span>
                                </div>
                                <p class="text-sm text-gray-600 truncate">هل المنتج متوفر الآن؟</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Chat Window -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-sm flex flex-col">
                <!-- Chat Header -->
                <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex gap-3 items-center">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="User" class="w-10 h-10 rounded-full">
                        <div>
                            <h2 class="font-semibold text-gray-900">خالد عبدالله</h2>
                            <p class="text-xs text-gray-500">نشط الآن</p>
                        </div>
                    </div>
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Messages -->
                <div class="overflow-y-auto flex-1 p-4 space-y-4">
                    <!-- Other User Message -->
                    <div class="flex gap-3">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="User" class="w-8 h-8 rounded-full flex-shrink-0">
                        <div class="bg-gray-100 rounded-lg p-3 max-w-xs">
                            <p class="text-gray-900 text-sm">السلام عليكم، هل المنتج متوفر الآن؟</p>
                            <span class="text-xs text-gray-500 mt-1 block">10:25 ص</span>
                        </div>
                    </div>

                    <!-- My Message -->
                    <div class="flex gap-3 justify-end">
                        <div class="bg-teal-600 text-white rounded-lg p-3 max-w-xs">
                            <p class="text-sm">وعليكم السلام ورحمة الله، نعم متوفر</p>
                            <span class="text-xs text-teal-100 mt-1 block">10:27 ص</span>
                        </div>
                        <img src="{{ asset('images/placeholder.svg') }}" alt="User" class="w-8 h-8 rounded-full flex-shrink-0">
                    </div>

                    <!-- Other User Message -->
                    <div class="flex gap-3">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="User" class="w-8 h-8 rounded-full flex-shrink-0">
                        <div class="bg-gray-100 rounded-lg p-3 max-w-xs">
                            <p class="text-gray-900 text-sm">كم السعر والتسليم؟</p>
                            <span class="text-xs text-gray-500 mt-1 block">10:28 ص</span>
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="p-4 border-t border-gray-200 flex gap-2">
                    <input type="text" placeholder="اكتب رسالتك..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 text-sm">
                    <button class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
