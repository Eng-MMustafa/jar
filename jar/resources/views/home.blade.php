@extends('layouts.app')

@section('content')
<!-- Hero Panel Section -->
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-10 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left big illustration -->
                <div class="md:col-span-2 bg-gradient-to-br from-emerald-50 to-white rounded-xl p-6 relative">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">انضم إلينا وابدأ إدارة ممتلكاتك بذكاء</h3>
                    <p class="text-gray-500 mb-4">منصة موثوقة لإدارة وتأجير ممتلكاتك داخل المملكة بسهولة وأمان.</p>

                    <div class="relative">
                        <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="illustration" class="mx-auto rounded-lg shadow-sm max-h-96 object-contain">

                        <!-- circular small icons (example) -->
                        <div class="absolute top-6 left-6 w-14 h-14 bg-white rounded-full shadow flex items-center justify-center">
                            <img src="{{ asset('images/login/Ellipse 1.png') }}" alt="icon" class="w-8 h-8">
                        </div>
                        <div class="absolute bottom-20 left-12 w-12 h-12 bg-white rounded-full shadow flex items-center justify-center">
                            <img src="{{ asset('images/login/Ellipse 2.png') }}" alt="icon" class="w-6 h-6">
                        </div>

                        <!-- small CTA bubble -->
                        <div class="absolute bottom-8 right-8">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-full shadow">في جار...</a>
                        </div>
                    </div>
                </div>

                <!-- Right: featured cards -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm">
                        <div class="flex items-start">
                            <img src="https://via.placeholder.com/140x120" alt="prod" class="w-32 h-28 object-cover rounded-lg">
                            <div class="mr-4 flex-1">
                                <h4 class="text-lg font-semibold text-gray-800">جهاز بلاي ستيشن 5</h4>
                                <p class="text-sm text-gray-500">جهاز ألعاب منزلي متطور</p>
                                <div class="mt-3">
                                    <span class="inline-block bg-emerald-600 text-white px-3 py-1 rounded-full text-sm">120 ر.س / يوم</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center">
                            <img src="https://via.placeholder.com/80" alt="prod" class="w-20 h-16 object-cover rounded-lg">
                            <div class="mr-4 flex-1">
                                <h5 class="text-sm font-semibold">خيمة ملكية للرحلات</h5>
                                <p class="text-xs text-gray-400">القصيم - بريدة</p>
                            </div>
                            <div>
                                <span class="inline-block text-emerald-600">90 ر.س</span>
                            </div>
                        </div>
                        <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center">
                            <img src="https://via.placeholder.com/80" alt="prod" class="w-20 h-16 object-cover rounded-lg">
                            <div class="mr-4 flex-1">
                                <h5 class="text-sm font-semibold">سماعات بلوتوث</h5>
                                <p class="text-xs text-gray-400">القصيم - بريدة</p>
                            </div>
                            <div>
                                <span class="inline-block text-emerald-600">80 ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Featured Products Section (Dark) -->
<section class="py-12 bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-white mb-1">الأكثر تأجيرًا</h2>
                <p class="text-teal-200 text-sm">استعرض الأكثر تأجيراً المفضلة مع أفضل المميزات والمنتجات أولاً بأول.</p>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <button class="carousel-arrow bg-emerald-600 hover:bg-emerald-700 text-white w-10 h-10 rounded-full">‹</button>
                <button class="carousel-arrow bg-emerald-600 hover:bg-emerald-700 text-white w-10 h-10 rounded-full">›</button>
            </div>
        </div>

        <!-- Grid of product cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach(\App\Models\Product::where('is_featured', true)->where('is_active', true)->take(8)->get() as $product)
            <div class="product-card bg-white text-gray-900 rounded-lg shadow-sm overflow-hidden">
                <div class="relative">
                    <img src="{{ $product->images->first()->image_path ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $product->name }}" class="w-full h-56 object-contain bg-white">
                    <div class="price-badge absolute top-3 left-3">{{ $product->rental_price_daily }} ر.س / يوم</div>
                </div>
                <div class="p-4">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex items-center text-xs text-gray-400">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.21c.969 0 1.371 1.24.588 1.81l-3.405 2.474a1 1 0 00-.364 1.118l1.286 3.966c.3.921-.755 1.688-1.54 1.118L10 15.347l-3.405 2.474c-.785.57-1.84-.197-1.54-1.118l1.286-3.966a1 1 0 00-.364-1.118L2.572 9.393c-.783-.57-.38-1.81.588-1.81h4.21a1 1 0 00.95-.69l1.286-3.966z"/></svg>
                                <span class="text-sm text-gray-600 ml-2">{{ number_format($product->average_rating ?? 4.3,1) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('products.show', $product->slug) }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">إجر الآن</a>
                        <div class="text-xs text-gray-400">{{ $product->city ?? 'القصيم' }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Banners strip -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4">
            <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="banner" class="w-full rounded-lg">
            <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="banner" class="w-full rounded-lg">
            <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="banner" class="w-full rounded-lg">
        </div>

    </div>
</section>

<!-- Nearby Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">قريب منك</h3>
                <p class="text-sm text-gray-500">استعرض منتجات متاحة في منطقتك - {{ 'القصيم' }}</p>
            </div>
            <a href="#" class="text-emerald-600">عرض الكل</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach(\App\Models\Product::where('is_active', true)->take(8)->get() as $p)
            <div class="bg-white rounded-lg shadow-sm p-4">
                <img src="{{ $p->images->first()->image_path ?? 'https://via.placeholder.com/300x220' }}" alt="{{ $p->name }}" class="w-full h-40 object-cover rounded-md mb-3">
                <h4 class="font-semibold">{{ $p->name }}</h4>
                <div class="text-sm text-gray-500 mb-2">{{ Str::limit($p->description,60) }}</div>
                <div class="flex items-center justify-between">
                    <span class="text-emerald-600 font-bold">{{ $p->rental_price_daily }} ر.س</span>
                    <a href="{{ route('products.show', $p->slug) }}" class="inline-flex items-center px-3 py-1 bg-emerald-600 text-white rounded">إجر الآن</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




@endsection
