@extends('layouts.app')

@section('content')
<!-- Hero Section with Featured Products -->
<div class="bg-white py-8 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left: Big Card - PlayStation 5 -->
            <div class="lg:col-span-2 bg-[#E6F6F680] rounded-2xl overflow-hidden relative group order-2 lg:order-1">
                <!-- Price Badge -->
                <div class="absolute -top-4 -left-4 bg-[#00A5A5] rounded-full w-24 h-24 lg:w-28 lg:h-28 flex items-center justify-center shadow-2xl z-20">
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-1 text-white">
                            <span class="text-2xl lg:text-3xl font-bold">90</span>
                            <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-6 h-6 brightness-0 invert">
                        </div>
                        <div class="text-xs text-white font-medium">/ بالشهر</div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row h-full min-h-80 lg:min-h-96">
                    <!-- Content Section -->
                    <div class="lg:w-3/5 p-6 lg:p-10 flex flex-col justify-between text-right bg-[#E6F6F680]">
                        <div>
                            <div class="flex items-center justify-start gap-2 mb-2">
                                <span class="text-[#00A5A5] font-bold">—</span>
                                <span class="text-[#00A5A5] text-sm font-bold">الالعاب</span>
                            </div>
                            <h3 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">جهاز بلاي ستيشن 5</h3>
                            <p class="text-gray-600 text-base leading-relaxed mb-6">جهاز ألعاب منزلي متطور يقدم رسوميات مذهلة وتجربة ألعاب سلسة وسريعة.</p>
                            <p class="text-gray-500 text-sm flex items-center justify-start gap-2 mb-8">
                                <img src="{{ asset('images/Icons/Map Point.svg') }}" class="w-4 h-4 opacity-50">
                                <span>بريدة</span>
                                <span>-</span>
                                <span>القصيم</span>
                            </p>
                        </div>
                        <a href="#" class="transform hover:scale-105 transition-transform duration-200 block w-fit">
                            <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-12 w-auto object-contain">
                        </a>
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
                <div class="bg-[#003A3A] rounded-2xl overflow-hidden relative group flex-1">
                    <!-- Price Badge -->
                    <div class="absolute -top-3 -left-3 bg-[#00A5A5] rounded-full w-20 h-20 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="flex items-center justify-center gap-1 text-white">
                                <span class="text-2xl font-bold">80</span>
                                <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-4 h-4 brightness-0 invert">
                            </div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5 h-full">
                        <div class="flex-1 flex flex-col justify-between text-white text-right">
                            <div>
                                <p class="text-xs text-teal-200 font-semibold mb-2">— المعدل</p>
                                <h4 class="text-lg font-bold mb-2 leading-tight">خيمة ملكية للرحلات</h4>
                                <p class="text-xs text-teal-100 flex items-center justify-start gap-1 mb-3">
                                    <img src="{{ asset('images/Icons/Map Point.svg') }}" class="w-3 h-3 opacity-70">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <a href="#" class="transform hover:scale-105 transition-transform duration-200 block w-fit ml-auto">
                                <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-10 w-auto object-contain">
                            </a>
                        </div>
                        <div class="w-24 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة" class="w-full h-auto object-contain rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                    </div>
                </div>

                <!-- Card 2: Headphones -->
                <div class="bg-[#E6F6F680] rounded-2xl overflow-hidden relative group flex-1">
                    <!-- Price Badge -->
                    <div class="absolute -top-3 -left-3 bg-[#00A5A5] rounded-full w-20 h-20 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="flex items-center justify-center gap-1 text-white">
                                <span class="text-2xl font-bold">80</span>
                                <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-4 h-4 brightness-0 invert">
                            </div>
                            <div class="text-xs text-white">/ بالشهر</div>
                        </div>
                    </div>

                    <div class="flex gap-4 p-5 h-full">
                        <div class="flex-1 flex flex-col justify-between text-right">
                            <div>
                                <p class="text-xs text-[#00A5A5] font-semibold mb-2">— إلكترونيات</p>
                                <h4 class="text-lg font-bold text-gray-800 mb-2 leading-tight">سماعات لا سلكية</h4>
                                <p class="text-xs text-gray-500 flex items-center justify-start gap-1 mb-3">
                                    <img src="{{ asset('images/Icons/Map Point.svg') }}" class="w-3 h-3 opacity-50">
                                    <span>بريدة</span>
                                    <span>-</span>
                                    <span>القصيم</span>
                                </p>
                            </div>
                            <a href="#" class="transform hover:scale-105 transition-transform duration-200 block w-fit ml-auto">
                                <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-10 w-auto object-contain">
                            </a>
                        </div>
                        <div class="w-24 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/Images/Image (2).png') }}" alt="سماعات" class="w-full h-auto object-contain rounded-lg group-hover:scale-110 transition duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4" dir="rtl">
            <div class="text-right">
                <div class="flex items-center gap-3 mb-2 justify-start">
                    <div class="h-8 w-1 bg-teal-500 rounded-full"></div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-teal-600">الأقسام الرئيسية</h2>
                </div>
                <p class="text-gray-500 text-sm md:text-base leading-relaxed pr-4">
                    تصنيفات منظمة تتيح لك الوصول السريع إلى جميع الخدمات والمنتجات بكل سهولة.
                </p>
            </div>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700 font-medium flex items-center gap-2 group whitespace-nowrap self-end md:self-auto mb-1">
                <span>عرض الكل</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
        </div>

        <!-- Categories Slider Container -->
        <div class="relative px-4">
            <!-- Previous Arrow -->
            <button id="categoryPrev" class="absolute -right-4 top-1/2 transform -translate-y-1/2 z-10 bg-teal-500 shadow-lg rounded-full w-10 h-10 flex items-center justify-center hover:bg-teal-600 transition duration-300 group">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Next Arrow -->
            <button id="categoryNext" class="absolute -left-4 top-1/2 transform -translate-y-1/2 z-10 bg-teal-500 shadow-lg rounded-full w-10 h-10 flex items-center justify-center hover:bg-teal-600 transition duration-300 group">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <!-- Categories Slider -->
            <div id="categorySlider" class="overflow-x-auto scroll-smooth py-4 no-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">
                @php $cats = $categories ?? collect(); @endphp
                <div class="flex gap-6 min-w-full w-max px-4">
                    @foreach($cats as $category)
                        <div class="w-32 sm:w-40 md:w-48 lg:w-56 flex-shrink-0">
                            <a href="{{ route('categories.show', $category->slug) }}" class="group flex flex-col items-center justify-center bg-white border border-gray-100 rounded-2xl p-6 h-48 hover:border-teal-500 hover:shadow-md transition-all duration-300">
                                <div class="w-24 h-24 mb-4 flex items-center justify-center">
                                    @if($category->image_url)
                                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-contain group-hover:scale-110 transition duration-300" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-category.png') }}';">
                                    @elseif($category->icon)
                                        <i class="{{ $category->icon }} text-gray-400 group-hover:text-teal-600 text-4xl transition-colors duration-300"></i>
                                    @else
                                        <img src="{{ asset('images/placeholder-category.png') }}" alt="{{ $category->name }}" class="w-full h-full object-contain opacity-50">
                                    @endif
                                </div>
                                <span class="text-gray-800 font-bold text-base group-hover:text-teal-600 transition-colors duration-300 text-center">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('categorySlider');
    const prevBtn = document.getElementById('categoryPrev');
    const nextBtn = document.getElementById('categoryNext');

    if (!slider || !prevBtn || !nextBtn) return;

    // Scroll amount = width of visible area / 2 (or full width)
    const scrollAmount = () => slider.clientWidth / 2;

    nextBtn.addEventListener('click', () => {
        slider.scrollBy({ left: -scrollAmount(), behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        slider.scrollBy({ left: scrollAmount(), behavior: 'smooth' });
    });
});
</script>

<!-- Most Rented Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-teal-600 mb-1">الأكثر تأجيرًا</h2>
                <p class="text-gray-600 text-base">استعرض الأكثر تأجيرًا المضافة مع أفضل المميزات والتحديثات أولًا بأول.</p>
            </div>
            <a href="{{ route('about') }}" class="text-teal-600 text-sm hover:text-teal-700 font-medium">من نحن ←</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(isset($mostRented) && $mostRented->count())
                @foreach($mostRented as $product)
                    <x-product-card :product="$product" />
                @endforeach
            @else
                <div class="col-span-3 text-center text-gray-500">لا توجد منتجات متاحة</div>
            @endif
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
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">هكون قريب منك</h2>
                <p class="text-gray-600 text-base">
                    استعرض منتجات متاحة في منطقتك <span class="text-teal-600 font-bold">القصيم</span>
                </p>
            </div>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700 font-medium">عرض الكل ←</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(isset($featuredProducts) && $featuredProducts->count())
                @foreach($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            @else
                <div class="col-span-3 text-center text-gray-500">لا توجد منتجات لعرضها</div>
            @endif
        </div>
    </div>
</section>





@endsection
