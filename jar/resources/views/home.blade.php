@extends('layouts.app')

@section('content')
<!-- Hero Section with Featured Products -->
<div class="bg-white py-8 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left: Big Card - PlayStation 5 -->
            <div class="lg:col-span-2 bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl overflow-hidden relative group order-2 lg:order-1">
                <!-- Price Badge -->
                <div class="absolute -top-4 -left-4 bg-teal-500 rounded-full w-24 h-24 lg:w-28 lg:h-28 flex items-center justify-center shadow-2xl z-20">
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-white">120</div>
                        <div class="text-xs text-white font-medium">/ بالشهر</div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row h-full min-h-80 lg:min-h-96">
                    <!-- Content Section -->
                    <div class="lg:w-3/5 p-6 lg:p-8 flex flex-col justify-between text-right bg-white">
                        <div>
                            <p class="text-teal-600 text-sm font-bold mb-2">— الالعاب</p>
                            <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-3">جهاز بلايستيشن 5</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">جهاز ألعاب منزلي متطور يقدم رسوميات مذهلة وتجربة ألعاب سلسة وسريعة</p>
                            <p class="text-gray-500 text-xs flex items-center justify-end gap-2 mb-6">
                                <span>بريدة</span>
                                <span>-</span>
                                <span>القصيم</span>
                            </p>
                        </div>
                        <button class="bg-teal-500 text-white px-6 py-3 rounded-lg font-bold hover:bg-teal-600 transition duration-300 w-fit text-sm">
                            احجز الآن
                        </button>
                    </div>
                    
                    <!-- Image Section -->
                    <div class="lg:w-2/5 flex items-center justify-center p-6 lg:p-8">
                        <img src="{{ asset('images/Images/image 4.png') }}" alt="بلايستيشن 5" class="max-h-64 lg:max-h-72 object-contain group-hover:scale-110 transition duration-300">
                    </div>
                </div>
            </div>

            <!-- Right: Two Small Cards -->
            <div class="flex flex-col gap-6 order-1 lg:order-2">
                <!-- Card 1: Tent -->
                <div class="bg-gradient-to-br from-teal-800 to-teal-900 rounded-2xl overflow-hidden relative group">
                    <!-- Price Badge -->
                    <div class="absolute -top-3 -left-3 bg-teal-500 rounded-full w-20 h-20 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">90</div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5">
                        <div class="flex-1 flex flex-col justify-between text-white">
                            <div>
                                <p class="text-xs text-teal-200 font-semibold mb-2">— المعدل</p>
                                <h4 class="text-sm font-bold mb-2 leading-tight">خيمة ملكية للرحلات</h4>
                                <p class="text-xs text-teal-100 flex items-center justify-end gap-1 mb-3">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <button class="bg-white text-teal-900 px-4 py-2 rounded-lg font-bold hover:bg-gray-100 transition w-fit text-xs">
                                احجز الآن
                            </button>
                        </div>
                        <div class="w-24 h-24 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة" class="w-full h-full object-cover rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                    </div>
                </div>

                <!-- Card 2: Headphones -->
                <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl overflow-hidden relative group">
                    <!-- Price Badge -->
                    <div class="absolute -top-3 -left-3 bg-teal-500 rounded-full w-20 h-20 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">80</div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5">
                        <div class="flex-1 flex flex-col justify-between text-white">
                            <div>
                                <p class="text-xs text-gray-300 font-semibold mb-2">— إلكترونيات</p>
                                <h4 class="text-sm font-bold mb-2 leading-tight">سماعات لا سلكية</h4>
                                <p class="text-xs text-gray-300 flex items-center justify-end gap-1 mb-3">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition w-fit text-xs">
                                احجز الآن
                            </button>
                        </div>
                        <div class="w-24 h-24 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Image (2).png') }}" alt="سماعات" class="w-full h-full object-cover rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-teal-600 mb-2">الأقسام الرئيسية</h2>
            <p class="text-gray-600 text-sm">تصفح جميع الخدمات والمنتجات بكل سهولة</p>
        </div>

        <!-- Categories Slider Container -->
        <div class="relative">
            <!-- Previous Arrow -->
            <button id="categoryPrev" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-10 bg-white shadow-lg rounded-full p-3 hover:bg-gray-50 transition duration-300 group">
                <svg class="w-6 h-6 text-teal-600 group-hover:text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Next Arrow -->
            <button id="categoryNext" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 bg-white shadow-lg rounded-full p-3 hover:bg-gray-50 transition duration-300 group">
                <svg class="w-6 h-6 text-teal-600 group-hover:text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <!-- Categories Slider -->
            <div id="categorySlider" class="overflow-x-hidden">
                <div class="flex transition-transform duration-300 ease-in-out gap-6 md:gap-8" style="width: 200%;">
                    <!-- Category 1: Image-5 -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-5.png') }}" alt="إلكترونيات" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">إلكترونيات</span>
                        </a>
                    </div>

                    <!-- Category 2: Image-4 -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقائب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">حقائب</span>
                        </a>
                    </div>

                    <!-- Category 3: Image-1 -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-1.png') }}" alt="أدوات رياضية" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">أدوات رياضية</span>
                        </a>
                    </div>

                    <!-- Category 4: Image-2 -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-2.png') }}" alt="ألعاب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">ألعاب</span>
                        </a>
                    </div>

                    <!-- Category 5: Image -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image.png') }}" alt="معدات تخييم" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">معدات تخييم</span>
                        </a>
                    </div>

                    <!-- Duplicated Categories -->
                    <!-- Category 6: Image-5 (Duplicate) -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-5.png') }}" alt="إلكترونيات" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">إلكترونيات</span>
                        </a>
                    </div>

                    <!-- Category 7: Image-4 (Duplicate) -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقائب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">حقائب</span>
                        </a>
                    </div>

                    <!-- Category 8: Image-1 (Duplicate) -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-1.png') }}" alt="أدوات رياضية" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">أدوات رياضية</span>
                        </a>
                    </div>

                    <!-- Category 9: Image-2 (Duplicate) -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image-2.png') }}" alt="ألعاب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">ألعاب</span>
                        </a>
                    </div>

                    <!-- Category 10: Image (Duplicate) -->
                    <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                        <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                            <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/Images/Image.png') }}" alt="معدات تخييم" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                            </div>
                            <span class="text-gray-700 font-bold text-sm md:text-base">معدات تخييم</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySlider = document.getElementById('categorySlider');
    const categoryPrev = document.getElementById('categoryPrev');
    const categoryNext = document.getElementById('categoryNext');
    const sliderContent = categorySlider.querySelector('.flex');
    
    let currentPosition = 0;
    const itemWidth = 20; // Each item is 1/5 width (20%)
    const maxPosition = 50; // 50% (since we have 200% total width, we can scroll 50%)
    
    categoryNext.addEventListener('click', function() {
        if (currentPosition < maxPosition) {
            currentPosition += itemWidth;
            sliderContent.style.transform = `translateX(-${currentPosition}%)`;
        }
    });
    
    categoryPrev.addEventListener('click', function() {
        if (currentPosition > 0) {
            currentPosition -= itemWidth;
            sliderContent.style.transform = `translateX(-${currentPosition}%)`;
        }
    });
    
    // Auto-play functionality (optional)
    setInterval(function() {
        if (currentPosition >= maxPosition) {
            currentPosition = 0;
        } else {
            currentPosition += itemWidth;
        }
        sliderContent.style.transform = `translateX(-${currentPosition}%)`;
    }, 5000); // Change slide every 5 seconds
});
</script>

<!-- Most Rented Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-teal-600">أكثر تأجيراً</h2>
            <a href="{{ route('about') }}" class="text-teal-600 text-sm hover:text-teal-700 font-medium">من نحن ←</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product 1: عدة للايجار البحري -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="عدة للايجار البحري" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <!-- Rating -->
                    <div class="absolute top-3 right-3 flex items-center bg-white rounded-full px-2 py-1 shadow-sm">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-medium">4.2</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">عدة للايجار البحري</h3>
                    <p class="text-gray-600 text-xs mb-2">سلة مليئة ومفيدة مناسبة للاستخدام البحري والنقل بكل سهولة</p>
                    <p class="text-gray-500 text-xs mb-3 flex items-center justify-end gap-2">
                        <span>بريدة</span>
                        <span>-</span>
                        <span>القصيم</span>
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">30 ريال <span class="text-xs text-gray-500">/ يوم</span></div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            اجرها الآن
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2: خيمة ملكية للرحلات -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة ملكية للرحلات" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <!-- Rating -->
                    <div class="absolute top-3 right-3 flex items-center bg-white rounded-full px-2 py-1 shadow-sm">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-medium">4.3</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">خيمة ملكية للرحلات</h3>
                    <p class="text-gray-600 text-xs mb-2">خيمة ملكية للرحلات. خيمة كبيرة وواسعة تقام الآلة وأحجامها ملائمة للرحلات والحج و العمرة للأسرة الكريمة</p>
                    <p class="text-gray-500 text-xs mb-3 flex items-center justify-end gap-2">
                        <span>بريدة</span>
                        <span>-</span>
                        <span>القصيم</span>
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">80 ريال <span class="text-xs text-gray-500">/ يوم</span></div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            اجرها الآن
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3: جهاز بلايستيشن 5 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/image 4.png') }}" alt="جهاز بلايستيشن 5" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <!-- Rating -->
                    <div class="absolute top-3 right-3 flex items-center bg-white rounded-full px-2 py-1 shadow-sm">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-medium">4.5</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">جهاز بلايستيشن 5</h3>
                    <p class="text-gray-600 text-xs mb-2">جهاز ألعاب منزلي متطور يقدم رسوميات مذهلة وتجربة ألعاب سلسة وسريعة</p>
                    <p class="text-gray-500 text-xs mb-3 flex items-center justify-end gap-2">
                        <span>بريدة</span>
                        <span>-</span>
                        <span>القصيم</span>
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">120 ريال <span class="text-xs text-gray-500">/ يوم</span></div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            اجرها الآن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Banners -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Banner 1 -->
            <div class="rounded-xl h-48 overflow-hidden relative group shadow-lg">
                <img src="{{ asset('images/Images/image 17.png') }}" alt="عروض مميزة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent group-hover:from-black/40 transition duration-300"></div>
            </div>

            <!-- Banner 2 -->
            <div class="rounded-xl h-48 overflow-hidden relative group shadow-lg">
                <img src="{{ asset('images/Images/image 18.png') }}" alt="خدمات متنوعة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent group-hover:from-black/40 transition duration-300"></div>
            </div>

            <!-- Banner 3 -->
            <div class="rounded-xl h-48 overflow-hidden relative group shadow-lg">
                <img src="{{ asset('images/Images/image 19.png') }}" alt="تجربة مميزة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent group-hover:from-black/40 transition duration-300"></div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-teal-600">أكثر قيمة</h2>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700 font-medium">عرض الكل ←</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقيبة ذكية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">حقيبة ذكية بالمواصفات</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة - القصيم</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">30 ريال</div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            احجز الآن
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة ملكية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">خيمة ملكية للرحلات</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة - القصيم</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">90 ريال</div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            احجز الآن
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image (2).png') }}" alt="سماعات لا سلكية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">سماعات لا سلكية</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة - القصيم</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">80 ريال</div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            احجز الآن
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden group border border-gray-100">
                <div class="bg-gray-50 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image.png') }}" alt="أغطية بحري" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-sm mb-2">أغطية بحري للرحلات</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة - القصيم</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-600 font-bold text-lg">65 ريال</div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition text-sm">
                            احجز الآن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection
