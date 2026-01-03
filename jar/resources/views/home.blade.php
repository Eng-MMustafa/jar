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

<!-- Categories Section -->
<div class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-teal-700">الأقسام الرئيسية</h2>
            <a href="#" class="text-teal-600 text-sm hover:text-teal-700">عرض الكل →</a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-4">
            @php
                $categories = [
                    ['name' => 'ملابس', 'icon' => 'Wallet Money.svg'],
                    ['name' => 'كاميرا', 'icon' => 'Upload.svg'],
                    ['name' => 'كتب', 'icon' => 'Widget 5.svg'],
                    ['name' => 'أثاث', 'icon' => 'Box Minimalistic.svg'],
                    ['name' => 'ألعاب', 'icon' => 'Widget Add.svg'],
                    ['name' => 'سماعات', 'icon' => 'Button.svg'],
                    ['name' => 'هاتف', 'icon' => 'Card.svg'],
                ];
            @endphp

            @foreach($categories as $cat)
            <a href="#" class="text-center hover:transform hover:scale-110 transition duration-300">
                <div class="bg-teal-50 rounded-full w-16 h-16 mx-auto mb-3 flex items-center justify-center hover:bg-teal-100 transition">
                    <img src="{{ asset('images/Icons/' . $cat['icon']) }}" alt="{{ $cat['name'] }}" class="w-8 h-8">
                </div>
                <p class="text-sm font-medium text-gray-700 text-center line-clamp-2">{{ $cat['name'] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</div>

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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse(\App\Models\Product::where('is_active', true)->take(4)->get() as $product)
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
            <div class="col-span-4 text-center py-8 text-gray-500">لا توجد منتجات</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Promotional Banners -->
<div class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-lg h-40 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-pattern"></div>
                <div class="text-center text-white relative z-10">
                    <h3 class="text-lg font-bold">لديك عرض خاص</h3>
                    <p class="text-sm text-teal-100 mt-1">احصل على خصم 20%</p>
                </div>
            </div>
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg h-40 flex items-center justify-center relative overflow-hidden">
                <div class="text-center text-white relative z-10">
                    <h3 class="text-lg font-bold">عرض محدود</h3>
                    <p class="text-sm text-pink-100 mt-1">انتهز الفرصة الآن</p>
                </div>
            </div>
            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-lg h-40 flex items-center justify-center relative overflow-hidden">
                <div class="text-center text-white relative z-10">
                    <h3 class="text-lg font-bold">عروض يومية</h3>
                    <p class="text-sm text-emerald-100 mt-1">تحديث يومي للمنتجات</p>
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
