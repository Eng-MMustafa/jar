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

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
            <!-- Category 1: Image-5 -->
            <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300 h-32 md:h-40">
                <div class="w-16 h-16 md:w-20 md:h-20 mb-2 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/Images/Image-5.png') }}" alt="إلكترونيات" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                </div>
                <span class="text-gray-700 font-semibold text-xs md:text-sm">إلكترونيات</span>
            </a>

            <!-- Category 2: Image-4 -->
            <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300 h-32 md:h-40">
                <div class="w-16 h-16 md:w-20 md:h-20 mb-2 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقائب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                </div>
                <span class="text-gray-700 font-semibold text-xs md:text-sm">حقائب</span>
            </a>

            <!-- Category 3: Image-1 -->
            <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300 h-32 md:h-40">
                <div class="w-16 h-16 md:w-20 md:h-20 mb-2 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/Images/Image-1.png') }}" alt="أدوات رياضية" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                </div>
                <span class="text-gray-700 font-semibold text-xs md:text-sm">أدوات رياضية</span>
            </a>

            <!-- Category 4: Image-2 -->
            <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300 h-32 md:h-40">
                <div class="w-16 h-16 md:w-20 md:h-20 mb-2 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/Images/Image-2.png') }}" alt="ألعاب" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                </div>
                <span class="text-gray-700 font-semibold text-xs md:text-sm">ألعاب</span>
            </a>

            <!-- Category 5: Image -->
            <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300 h-32 md:h-40">
                <div class="w-16 h-16 md:w-20 md:h-20 mb-2 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/Images/Image.png') }}" alt="معدات تخييم" class="w-full h-full object-contain group-hover:scale-110 transition duration-300">
                </div>
                <span class="text-gray-700 font-semibold text-xs md:text-sm">معدات تخييم</span>
            </a>
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
