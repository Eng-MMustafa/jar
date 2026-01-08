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
                        <div class="flex items-center justify-center gap-1 text-white">
                            <span class="text-2xl lg:text-3xl font-bold">120</span>
                            <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-6 h-6 brightness-0 invert">
                        </div>
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
                <div class="bg-gradient-to-br from-teal-800 to-teal-900 rounded-2xl overflow-hidden relative group">
                    <!-- Price Badge -->
                    <div class="absolute -top-3 -left-3 bg-teal-500 rounded-full w-20 h-20 flex items-center justify-center shadow-lg z-20">
                        <div class="text-center">
                            <div class="flex items-center justify-center gap-1 text-white">
                                <span class="text-2xl font-bold">90</span>
                                <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-4 h-4 brightness-0 invert">
                            </div>
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
                            <a href="#" class="transform hover:scale-105 transition-transform duration-200 block w-fit">
                                <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-10 w-auto object-contain">
                            </a>
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
                            <div class="flex items-center justify-center gap-1 text-white">
                                <span class="text-2xl font-bold">80</span>
                                <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" class="w-4 h-4 brightness-0 invert">
                            </div>
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
                            <a href="#" class="transform hover:scale-105 transition-transform duration-200 block w-fit">
                                <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-10 w-auto object-contain">
                            </a>
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
                @php $cats = $categories ?? collect(); @endphp
                <div class="flex transition-transform duration-300 ease-in-out gap-6 md:gap-8" style="width: 200%;">
                    @foreach($cats as $category)
                        <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                            <a href="{{ route('categories.show', $category->slug) }}" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                                <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                    @if($category->image_url)
                                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-contain group-hover:scale-110 transition duration-300" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-category.png') }}';">
                                    @elseif($category->icon)
                                        <i class="{{ $category->icon }} text-teal-600 text-2xl"></i>
                                    @else
                                        <img src="{{ asset('images/placeholder-category.png') }}" alt="{{ $category->name }}" class="w-full h-full object-contain">
                                    @endif
                                </div>
                                <span class="text-gray-700 font-bold text-sm md:text-base">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach

                    {{-- Duplicate for seamless scrolling --}}
                    @foreach($cats as $category)
                        <div class="min-w-0 flex-shrink-0 w-1/5 sm:w-1/6 md:w-1/10">
                            <a href="{{ route('categories.show', $category->slug) }}" class="group flex flex-col items-center justify-center bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-300 h-40 md:h-44 p-6">
                                <div class="w-20 h-20 md:w-24 md:h-24 mb-3 overflow-hidden flex items-center justify-center">
                                    @if($category->image_url)
                                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-contain group-hover:scale-110 transition duration-300" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-category.png') }}';">
                                    @elseif($category->icon)
                                        <i class="{{ $category->icon }} text-teal-600 text-2xl"></i>
                                    @else
                                        <img src="{{ asset('images/placeholder-category.png') }}" alt="{{ $category->name }}" class="w-full h-full object-contain">
                                    @endif
                                </div>
                                <span class="text-gray-700 font-bold text-sm md:text-base">{{ $category->name }}</span>
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
    const categorySlider = document.getElementById('categorySlider');
    const categoryPrev = document.getElementById('categoryPrev');
    const categoryNext = document.getElementById('categoryNext');
    const sliderContent = categorySlider.querySelector('.flex');

    let currentPosition = 0;
    const visiblePerView = 5; // how many categories are visible at once
    const itemWidth = 100 / visiblePerView; // percent per item
    const totalItems = sliderContent.children.length; // doubled list
    // uniqueCount is half since we duplicated list for smooth scroll
    const uniqueCount = Math.floor(totalItems / 2) || totalItems;
    const maxPosition = (uniqueCount * itemWidth) - (visiblePerView * itemWidth);

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
