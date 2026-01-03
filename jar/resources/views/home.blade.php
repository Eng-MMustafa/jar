@extends('layouts.app')

@section('content')
<!-- Hero Section with Featured Products -->
<div class="bg-white py-12 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Right: Big Card - PlayStation 5 -->
            <div class="lg:col-span-2 bg-cyan-50 rounded-2xl overflow-hidden relative group lg:row-span-2">
                <div class="absolute -top-8 -right-8 bg-teal-500 rounded-full w-32 h-32 flex items-center justify-center shadow-2xl z-20">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">120</div>
                        <div class="text-sm text-white font-semibold">/ بالشهر</div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row h-full min-h-96">
                    <!-- Image Section -->
                    <div class="lg:w-2/5 flex items-center justify-center p-8 bg-cyan-50">
                        <img src="{{ asset('images/Images/image 4.png') }}" alt="بلايستيشن 5" class="h-72 object-contain group-hover:scale-110 transition duration-300">
                    </div>

                    <!-- Content Section -->
                    <div class="lg:w-3/5 p-8 flex flex-col justify-between text-right bg-white">
                        <div>
                            <p class="text-teal-600 text-sm font-bold mb-3">— الالعاب</p>
                            <h3 class="text-3xl font-bold text-gray-800 mb-4">جهاز بلايستيشن 5</h3>
                            <p class="text-gray-700 text-sm leading-relaxed mb-3">جهاز ألعاب منزلي متطور يقدم رسوميات مذهلة وتحرية، ألعاب سلسة وسريعة</p>
                            <p class="text-gray-500 text-xs flex items-center justify-end gap-2 mb-6">
                                <span>بريدة</span>
                                <span>-</span>
                                <span>القصيم</span>
                            </p>
                        </div>
                        <button class="bg-teal-500 text-white px-6 py-3 rounded-lg font-bold hover:bg-teal-600 transition w-fit text-sm">أجرتالآن</button>
                    </div>
                </div>
            </div>

            <!-- Left: Two Small Cards -->
            <div class="flex flex-col gap-8">
                <!-- Card 1: Tent -->
                <div class="bg-teal-900 rounded-2xl overflow-hidden relative group">
                    <div class="absolute -top-6 -right-6 bg-teal-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">90</div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5">
                        <div class="w-28 h-28 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة" class="w-full h-full object-cover rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="flex-1 flex flex-col justify-between text-white py-1">
                            <div>
                                <p class="text-xs text-teal-200 font-semibold mb-2">— المعدل</p>
                                <h4 class="text-base font-bold mb-1 leading-tight">خيمة ملكية<br/>للرحلات</h4>
                                <p class="text-xs text-teal-100 flex items-center gap-2">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <button class="bg-white text-teal-900 px-4 py-2 rounded-lg font-bold hover:bg-gray-100 transition w-fit text-xs">أجرتالآن</button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Headphones -->
                <div class="bg-gray-800 rounded-2xl overflow-hidden relative group">
                    <div class="absolute -top-6 -right-6 bg-teal-500 rounded-full w-24 h-24 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">80</div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5">
                        <div class="w-28 h-28 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Image (2).png') }}" alt="سماعات" class="w-full h-full object-cover rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="flex-1 flex flex-col justify-between text-white py-1">
                            <div>
                                <p class="text-xs text-gray-400 font-semibold mb-2">— إلكترونيات</p>
                                <h4 class="text-base font-bold mb-1 leading-tight">سماعات<br/>لا سلكية</h4>
                                <p class="text-xs text-gray-400 flex items-center gap-2">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <button class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-teal-600 transition w-fit text-xs">أجرتالآن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Carousel Section -->
<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-teal-600 mb-3">الأقسام الرئيسية</h2>
            <p class="text-gray-600 text-base">تصفح جميع الخدمات والمنتجات بكل سهولة</p>
        </div>

        <!-- Carousel Container -->
        <div class="relative group">
            <!-- Categories Horizontal Scroll -->
            <div class="categories-carousel overflow-hidden">
                <div class="categories-grid flex gap-6 transition-transform duration-500" id="categoriesGrid">
                    <!-- Category 1: Image-5 -->
                    <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 flex-shrink-0 w-48 h-56 overflow-hidden">
                        <div class="w-full h-40 overflow-hidden flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('images/Images/Image-5.png') }}" alt="فئة 1" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <span class="text-gray-700 font-semibold text-sm">فئة 1</span>
                        </div>
                    </a>

                    <!-- Category 2: Image-4 -->
                    <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 flex-shrink-0 w-48 h-56 overflow-hidden">
                        <div class="w-full h-40 overflow-hidden flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('images/Images/Image-4.png') }}" alt="فئة 2" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <span class="text-gray-700 font-semibold text-sm">فئة 2</span>
                        </div>
                    </a>

                    <!-- Category 3: Image-1 -->
                    <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 flex-shrink-0 w-48 h-56 overflow-hidden">
                        <div class="w-full h-40 overflow-hidden flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('images/Images/Image-1.png') }}" alt="فئة 3" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <span class="text-gray-700 font-semibold text-sm">فئة 3</span>
                        </div>
                    </a>

                    <!-- Category 4: Image-2 -->
                    <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 flex-shrink-0 w-48 h-56 overflow-hidden">
                        <div class="w-full h-40 overflow-hidden flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('images/Images/Image-2.png') }}" alt="فئة 4" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <span class="text-gray-700 font-semibold text-sm">فئة 4</span>
                        </div>
                    </a>

                    <!-- Category 5: Image -->
                    <a href="#" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 flex-shrink-0 w-48 h-56 overflow-hidden">
                        <div class="w-full h-40 overflow-hidden flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('images/Images/Image.png') }}" alt="فئة 5" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <span class="text-gray-700 font-semibold text-sm">فئة 5</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 -ml-6 lg:-ml-16 bg-teal-600 hover:bg-teal-700 text-white rounded-full p-3 shadow-lg transition opacity-0 group-hover:opacity-100 duration-300 z-10 transform hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 -mr-6 lg:-mr-16 bg-teal-600 hover:bg-teal-700 text-white rounded-full p-3 shadow-lg transition opacity-0 group-hover:opacity-100 duration-300 z-10 transform hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <!-- Dots Indicators -->
        <div class="flex justify-center gap-2 mt-8">
            <div id="dot1" class="w-2 h-2 rounded-full bg-teal-600 transition-all duration-300 cursor-pointer"></div>
            <div id="dot2" class="w-2 h-2 rounded-full bg-gray-300 transition-all duration-300 cursor-pointer"></div>
        </div>
    </div>
</section>

<script>
    // Categories Carousel Script
    const grid = document.getElementById('categoriesGrid');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dot1 = document.getElementById('dot1');
    const dot2 = document.getElementById('dot2');
    let currentPosition = 0;
    const cardWidth = 216; // w-48 = 192px + gap-6 = 24px
    const totalCards = 5;
    const maxPosition = Math.max(0, totalCards - 1);

    function updateCarousel() {
        const translateValue = -currentPosition * cardWidth;
        grid.style.transform = `translateX(${translateValue}px)`;
        
        // Update dots
        dot1.classList.toggle('bg-teal-600', currentPosition === 0);
        dot1.classList.toggle('bg-gray-300', currentPosition !== 0);
        dot2.classList.toggle('bg-teal-600', currentPosition === maxPosition);
        dot2.classList.toggle('bg-gray-300', currentPosition !== maxPosition);
    }

    prevBtn.addEventListener('click', () => {
        if (currentPosition > 0) {
            currentPosition--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentPosition < maxPosition) {
            currentPosition++;
            updateCarousel();
        }
    });

    dot1.addEventListener('click', () => {
        currentPosition = 0;
        updateCarousel();
    });

    dot2.addEventListener('click', () => {
        currentPosition = maxPosition;
        updateCarousel();
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        currentPosition = Math.min(currentPosition, maxPosition);
        updateCarousel();
    });
</script>

<!-- Most Valued Products Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-teal-700">أكثر قيمة</h2>
                <p class="text-gray-600 text-sm mt-1">استعرض أفضل المنتجات والعروض الحصرية</p>
            </div>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700">عرض الكل →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="منتج 1" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.5</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">حقيبة ذكية بالمواصفات</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">30 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/image 6.png') }}" alt="منتج 2" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.3</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">حقيبة للرحلات والمخيم</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">45 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="منتج 3" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.2</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">خيمة للمخيم البدوي</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">90 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="منتج 4" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.2</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">خيمة للمخيم البدوي</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">90 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="منتج 5" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.5</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">حقيبة ذكية بالمواصفات</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">30 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="منتج 6" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.2</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">خيمة للمخيم البدوي</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">90 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Banners -->
<div class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Banner 1 -->
            <div class="rounded-lg h-40 overflow-hidden relative group">
                <img src="{{ asset('images/Images/image 17.png') }}" alt="عروض يومية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h3 class="text-lg font-bold">عروض يومية</h3>
                        <p class="text-sm mt-1">تحديث يومي للمنتجات</p>
                    </div>
                </div>
            </div>

            <!-- Banner 2 -->
            <div class="rounded-lg h-40 overflow-hidden relative group">
                <img src="{{ asset('images/Images/image 18.png') }}" alt="عرض محدود" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h3 class="text-lg font-bold">عرض محدود</h3>
                        <p class="text-sm mt-1">انتهز الفرصة الآن</p>
                    </div>
                </div>
            </div>

            <!-- Banner 3 -->
            <div class="rounded-lg h-40 overflow-hidden relative group">
                <img src="{{ asset('images/Images/image 19.png') }}" alt="عرض خاص" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h3 class="text-lg font-bold">لديك عرض خاص</h3>
                        <p class="text-sm mt-1">احصل على خصم 20%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Near You Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-teal-700">قريب منك</h2>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700">عرض الكل →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full font-semibold">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.5</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">خيمة للمخيم البدوي</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">90 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image.png') }}" alt="أغطية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full font-semibold">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.3</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">أغطية بحري</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">80 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقيبة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full font-semibold">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">4.2</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">حقيبة للرحلات والمخيم</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">30 ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
