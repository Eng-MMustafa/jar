@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Sidebar - User Profile (Right Side for RTL) - 30% -->
            <div class="w-full lg:w-3/10 order-last lg:order-first">
                <!-- Profile Card -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4">
                        <h3 class="font-semibold text-gray-900">فريد بن نواف</h3>
                        <p class="text-sm text-gray-500 mt-1">البريدة - القصيم</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="mt-6 space-y-3">
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-lg border border-gray-200 transition-colors text-sm font-medium">
                        ✏️ تعديل الملف الشخصي
                    </a>
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-lg border border-gray-200 transition-colors text-sm font-medium">
                        🏠 طلبات الإيجار الجديدة
                    </a>
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-lg border border-gray-200 transition-colors text-sm font-medium">
                        💬 المراسلات
                    </a>
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-lg border border-gray-200 transition-colors text-sm font-medium">
                        🧴 طلبات الإيجار المجددة
                    </a>
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-red-600 rounded-lg border border-red-200 transition-colors text-sm font-medium">
                        🚪 تسجيل الخروج
                    </a>
                    <a href="#" class="block px-4 py-3 bg-white hover:bg-gray-50 text-red-600 rounded-lg border border-red-200 transition-colors text-sm font-medium">
                        ⚙️ حذف الحساب
                    </a>
                </div>
            </div>

            <!-- Main Content (Left Side for RTL) - 70% -->
            <div class="w-full lg:w-7/10">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                        <a href="{{ route('products.index') }}" class="text-teal-600 hover:text-teal-700 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <h1 class="text-2xl font-bold text-gray-900">إضافة منتج جديد</h1>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                اسم المنتج <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="أدخل اسم المنتج">
                            @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                الوصف <span class="text-red-600">*</span>
                            </label>
                            <textarea name="description" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="اكتب وصفاً مفصلاً للمنتج"></textarea>
                            @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                الفئة <span class="text-red-600">*</span>
                            </label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="category_id" value="1" class="w-4 h-4">
                                    <span class="text-sm text-gray-700">إلكترونيات</span>
                                </label>
                                <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="category_id" value="2" class="w-4 h-4">
                                    <span class="text-sm text-gray-700">أدوات</span>
                                </label>
                                <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="category_id" value="3" class="w-4 h-4">
                                    <span class="text-sm text-gray-700">ملابس</span>
                                </label>
                                <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="category_id" value="4" class="w-4 h-4">
                                    <span class="text-sm text-gray-700">إكسسوارات</span>
                                </label>
                            </div>
                            @error('category_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Upload 1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                صورة إضافية <span class="text-red-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:border-teal-600 hover:bg-teal-50 transition-colors" onclick="document.getElementById('image1Input').click()">
                                <input type="file" id="image1Input" name="image1" accept="image/*" class="hidden">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <p class="text-gray-700 font-medium">أضف صورة للمنتج</p>
                                <p class="text-xs text-gray-500 mt-1">أحجم صورة مقبولة للمنتج</p>
                            </div>
                        </div>

                        <!-- Image Upload 2 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                أخر صورة إضافية <span class="text-red-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:border-teal-600 hover:bg-teal-50 transition-colors" onclick="document.getElementById('image2Input').click()">
                                <input type="file" id="image2Input" name="image2" accept="image/*" class="hidden">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <p class="text-gray-700 font-medium">أضف صورة للمنتج</p>
                                <p class="text-xs text-gray-500 mt-1">أحجم صورة مقبولة للمنتج</p>
                            </div>
                        </div>

                        <!-- Price & Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Origin/Source -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">
                                    منع الإيجار <span class="text-red-600">*</span>
                                </label>
                                <select name="origin" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                                    <option value="">اختر</option>
                                    <option value="local">محلي</option>
                                    <option value="imported">مستورد</option>
                                </select>
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">
                                    السعر بالريال <span class="text-red-600">*</span>
                                </label>
                                <input type="number" name="price" required step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="0.00">
                                @error('price')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- City -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                المدينة <span class="text-red-600">*</span>
                            </label>
                            <select name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                                <option value="">اختر المدينة</option>
                                <option value="riyadh">الرياض</option>
                                <option value="jeddah">جدة</option>
                                <option value="dammam">الدمام</option>
                                <option value="medina">المدينة</option>
                                <option value="mecca">مكة</option>
                            </select>
                            @error('city')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6 border-t border-gray-200">
                            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-lg transition-colors">
                                حفظ المنتج
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection