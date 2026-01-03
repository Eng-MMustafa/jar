@extends('layouts.app')

@section('content')
<!-- Hero Section with Featured Products -->
<div class="bg-gradient-to-b from-blue-50 to-white py-8 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Teal Card - Headphones -->
            <div class="bg-gradient-to-br from-teal-600 to-teal-700 rounded-3xl overflow-hidden flex flex-col justify-between min-h-96 relative group">
                <div class="h-48 bg-teal-600 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/Images/Image (2).png') }}" alt="سماعات" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-6 text-white flex flex-col justify-between flex-1 relative z-10">
                    <div>
                        <span class="inline-block bg-white text-teal-600 px-4 py-1 rounded-full text-sm font-bold mb-3">مميز</span>
                        <h3 class="text-2xl font-bold mb-2">سماعات لاسلكية</h3>
                        <p class="text-teal-100 text-sm">جودة صوت عالية وراحة قصوى</p>
                    </div>
                    <button class="bg-white text-teal-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-100 w-fit text-base mt-4">تسوق الآن</button>
                </div>
            </div>

            <!-- Center: Black Card - Xbox -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-3xl overflow-hidden flex flex-col justify-between min-h-96 relative group">
                <div class="absolute -top-10 -right-10 bg-teal-500 rounded-full w-28 h-28 flex items-center justify-center text-center shadow-2xl z-20">
                    <div>
                        <div class="text-3xl font-bold text-white">120</div>
                        <div class="text-sm text-white">ريال</div>
                    </div>
                </div>
                <div class="h-48 bg-gray-900 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/Images/image 4.png') }}" alt="Xbox" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-6 text-white flex flex-col justify-between flex-1 relative z-10">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">جهاز بلايستيشن 5</h3>
                        <p class="text-gray-300 text-sm">أحدث أجهزة الألعاب بأفضل الأسعار</p>
                    </div>
                    <button class="bg-teal-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-teal-700 w-fit text-base mt-4">الشراء</button>
                </div>
            </div>

            <!-- Right: Orange Card - Bag -->
            <div class="bg-gradient-to-br from-orange-400 to-orange-500 rounded-3xl overflow-hidden flex flex-col justify-between min-h-96 relative group">
                <div class="h-48 bg-orange-400 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/Images/image 6.png') }}" alt="حقيبة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-6 text-white flex flex-col justify-between flex-1 relative z-10">
                    <div>
                        <span class="inline-block bg-teal-600 text-white px-4 py-1 rounded-full text-sm font-bold mb-3">جديد</span>
                        <h3 class="text-2xl font-bold mb-2">حقيبة ذكية بالمواصفات</h3>
                        <p class="text-orange-100 text-sm">أفضل سعر وجودة عالية</p>
                    </div>
                    <button class="bg-teal-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-teal-700 w-fit text-base mt-4">تسوق الآن</button>
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
            @forelse(\App\Models\Product::where('is_active', true)->take(6)->get() as $product)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    @if($product->images->first())
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <svg class="w-16 h-16 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4.5-4.5 3 3 4-4 2.5 2.5V5a2 2 0 012 2v10z"/>
                        </svg>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">{{ number_format($product->average_rating ?? 4.2, 1) }}</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">{{ $product->name }}</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">{{ $product->rental_price_daily }} ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-gray-500">لا توجد منتجات</div>
            @endforelse
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
            @forelse(\App\Models\Product::where('is_active', true)->limit(3)->get() as $product)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    @if($product->images->first())
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @endif
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full font-semibold">{{ $product->city ?? 'القصيم' }}</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700 ml-1">{{ number_format($product->average_rating ?? 4.3, 1) }}</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-xs mb-3">{{ $product->city ?? 'القصيم' }}</p>
                    <div class="flex items-center justify-between">
                        <div class="text-teal-700 font-bold">{{ $product->rental_price_daily }} ريال</div>
                        <button class="bg-teal-600 text-white px-3 py-1 rounded-lg font-semibold hover:bg-teal-700 transition text-sm">أضف</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-gray-500">لا توجد منتجات</div>
            @endforelse
        </div>
    </div>
</section>

@endsection
