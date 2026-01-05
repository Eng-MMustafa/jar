<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700&display=swap" rel="stylesheet" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom Auth Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <header>
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-2 text-sm">
                    <!-- Right: Contact -->
                    <div class="flex items-center space-x-1 space-x-reverse text-sm">
                        <a href="mailto:Support@tjar.sa" class="text-teal-600 hover:text-teal-700">Support@tjar.sa</a>
                        <span class="text-gray-400 px-2">|</span>
                        <a href="tel:+966556734562" class="text-teal-600 hover:text-teal-700">+966556734562</a>
                    </div>

                    <!-- Center: Social Icons -->
                    <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                        <a href="#" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-2.84v5.79a2.75 2.75 0 01-2.75 2.75 2.75 2.75 0 01-2.75-2.75V2H5.64v.44A4.83 4.83 0 011.87 6.69 4.83 4.83 0 016.12 11h.01a4.83 4.83 0 014.25-3.77V7.2h.01a4.83 4.83 0 014.25 3.77h.01a4.83 4.83 0 014.24-4.28zm-9.75 4.25a2.75 2.75 0 00-2.75-2.75 2.75 2.75 0 00-2.75 2.75v5.79h2.84v-5.79a2.75 2.75 0 012.75-2.75 2.75 2.75 0 012.75 2.75v5.79h2.84V11a2.75 2.75 0 00-2.75-2.75 2.75 2.75 0 00-2.88 2.69z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Left: Language and Location -->
                    <div class="flex items-center space-x-6 space-x-reverse">
                        <div class="flex items-center space-x-2 space-x-reverse text-gray-600">
                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                            <span>القصيم - بريدة</span>
                        </div>
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button class="text-gray-700 hover:text-gray-900 flex items-center space-x-1 space-x-reverse">
                                <svg class="w-3 h-3 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                                <span>العربية</span>
                            </button>
                            <div class="w-6 h-6 bg-teal-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-bold">ع</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Header Bar -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-3">
                    <!-- Right: Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR" class="h-12 w-auto">
                        </a>
                    </div>

                    <!-- Center: Search -->
                    <div class="flex-1 max-w-md mx-8">
                        <div class="relative">
                            <input type="search" 
                                   placeholder="ابحث عن : أجهزة كهربائية" 
                                   class="w-full py-2 px-4 pr-10 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500">
                            <button class="absolute inset-y-0 right-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Left: User Menu -->
                    <div class="flex items-center">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">تسجيل دخول</a>
                        @else
                            <!-- User Dropdown -->
                            <div class="relative" id="user-menu">
                                <div class="inline-block">
                                    <button class="flex items-center space-x-2 space-x-reverse text-gray-700 hover:text-gray-900">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                        </svg>
                                        <span>مرحباً {{ Auth::user()->name ?? 'المستخدم' }}</span>
                                        <svg class="w-4 h-4 text-gray-500 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown absolute hidden bg-white shadow-xl rounded-lg right-0 mt-2 min-w-56 z-50 border border-gray-200 overflow-hidden">
                                        <a href="{{ route('profile.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                <span>البروفيل</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span>الإعدادات</span>
                                            </div>
                                        </a>
                                        <hr class="border-gray-200">
                                        <a href="{{ route('cart.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13l1.1-5m8.9 5L17 8m0 0l1.1 5M9 21a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                </svg>
                                                <span>سلة التسوق</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('profile.bookings') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span>طلباتى</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('my-orders') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <span>طلباتى</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('profile.support-tickets') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>دعم العملاء</span>
                                            </div>
                                        </a>
                                        <hr class="border-gray-200">
                                        <form method="POST" action="{{ route('logout') }}" class="block">
                                            @csrf
                                            <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 hover:text-red-700 transition duration-200">
                                                <div class="flex items-center space-x-3 space-x-reverse">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                    </svg>
                                                    <span>تسجيل الخروج</span>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="bg-teal-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-start h-14 space-x-1.25 space-x-reverse">
                    <a href="{{ route('home') }}" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200 px-1" style="color: white !important;">الرئيسية</a>
                    <a href="{{ route('about') }}" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200 px-1" style="color: white !important;">من نحن</a>
                    <div class="relative group">
                        <button class="!text-white hover:!text-teal-100 font-medium text-sm flex items-center space-x-2 space-x-reverse transition duration-200 py-2 px-3 rounded hover:bg-teal-600" style="color: white !important;">
                            <span>الأقسام</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-lg right-0 mt-0 min-w-64 z-50 border border-gray-200 overflow-hidden">
                            @php
                                $categories = \App\Models\Category::where('is_active', true)->take(8)->get();
                            @endphp
                            @if($categories->count() > 0)
                                @foreach($categories as $cat)
                                    <a href="{{ route('categories.show', $cat->slug) }}" class="block px-5 py-3 text-gray-700 hover:bg-teal-50 text-sm border-b border-gray-100 transition duration-200 flex items-center space-x-2 space-x-reverse group/item">
                                        <svg class="w-4 h-4 text-teal-500 opacity-0 group-hover/item:opacity-100" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.488 5.951 1.488a1 1 0 001.169-1.409l-7-14z"/>
                                        </svg>
                                        <span>{{ $cat->name_ar ?? $cat->name_en }}</span>
                                    </a>
                                @endforeach
                                <a href="{{ route('categories.index') }}" class="block px-5 py-3 text-teal-600 hover:bg-teal-50 text-sm font-medium border-t-2 border-teal-100 transition duration-200">عرض جميع الأقسام →</a>
                            @else
                                <span class="block px-5 py-3 text-gray-500 text-sm">لا توجد أقسام متاحة</span>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200 px-1" style="color: white !important;">جميع المنتجات</a>
                    <a href="{{ route('contact') }}" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200 px-1" style="color: white !important;">تواصل معنا</a>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-teal-600">
            <div class="px-4 py-3 space-y-2">
                <div class="border-b border-teal-500 pb-3 mb-3">
                    <div class="relative">
                        <input type="search" placeholder="ابحث..." class="w-full py-2 px-4 pr-10 text-sm border border-gray-300 rounded-lg">
                        <button class="absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="block py-2 text-white hover:text-teal-100">الرئيسية</a>
                <a href="{{ route('about') }}" class="block py-2 text-white hover:text-teal-100">من نحن</a>
                <a href="#" class="block py-2 text-white hover:text-teal-100">الأقسام</a>
                <a href="#" class="block py-2 text-white hover:text-teal-100">أحدث المنتجات</a>
                <a href="{{ route('contact') }}" class="block py-2 text-white hover:text-teal-100">تواصل معنا</a>
                @guest
                    <a href="{{ route('login') }}" class="block py-2 text-white hover:text-teal-100">تسجيل دخول</a>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-right py-2 text-white hover:text-teal-100">تسجيل خروج</button>
                    </form>
                @endguest
            </div>
        </div>

        <!-- Mobile Menu Button (For smaller screens) -->
        <button id="mobile-menu-btn" class="md:hidden fixed top-4 left-4 z-50 bg-teal-500 text-white p-2 rounded-lg shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>
    </header>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer text-white py-12" style="background-color: #1a3a3a; background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,.03) 10px, rgba(255,255,255,.03) 20px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1: About -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">ملخص</h3>
                    <p class="text-teal-100 text-sm leading-relaxed mb-6">في جار لتأجير الممتلكات
شركة سعودية متخصصة تعمل كوسيط موثوق لتأجير مختلف أنواع الممتلكات، حيث تربط بين الملاك والمستأجرين عبر منصة سهلة الاستخدام تضمن السرعة، الأمان، ووضوح الإجراءات.</p>
                    <div class="flex gap-3">
                        <a href="#" class="footer-social w-8 h-8 rounded border border-teal-400 flex items-center justify-center hover:bg-teal-500/20 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7z"/></svg>
                        </a>
                        <a href="#" class="footer-social w-8 h-8 rounded border border-teal-400 flex items-center justify-center hover:bg-teal-500/20 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5.293-5.93m0 0A1 1 0 0012 3c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12c0-.846-.092-1.667-.266-2.459m0 0h5m0 0"/></svg>
                        </a>
                        <a href="#" class="footer-social w-8 h-8 rounded border border-teal-400 flex items-center justify-center hover:bg-teal-500/20 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37Z"/><circle cx="17.5" cy="6.5" r="1.5"/></svg>
                        </a>
                        <a href="#" class="footer-social w-8 h-8 rounded border border-teal-400 flex items-center justify-center hover:bg-teal-500/20 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm3.6 11.9h-2.4v8.4h-3.6v-8.4H8.4v-3h2.4v-1.8c0-2 .6-5.2 5.2-5.2h3.6v3h-2.6c-.4 0-.7.2-.7.9v1.3h3.4l-.8 3z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">روابط سريعة</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="text-teal-100 hover:text-white transition">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}" class="text-teal-100 hover:text-white transition">من نحن</a></li>
                        <li><a href="{{ route('categories.index') }}" class="text-teal-100 hover:text-white transition">الأقسام الرئيسية</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-teal-100 hover:text-white transition">أحدث المنتجات</a></li>
                        <li><a href="{{ route('contact') }}" class="text-teal-100 hover:text-white transition">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- Column 3: Popular Categories -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">الفئات الشائعة</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-teal-100 hover:text-white transition">الالكترونيات</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">الألعاب</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">المنزل</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">أغراض الخيم</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">أغراض البحر والبر</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Support -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">الاتصال والدعم</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-teal-100 hover:text-white transition">مركز العملاء</a></li>
                        <li><a href="{{ route('contact') }}" class="text-teal-100 hover:text-white transition">تواصل معنا</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">شارك معنا</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">تقديم شكوى</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white transition">الإبلاغ عن مشكلة</a></li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center mb-6">
                    <!-- Payment Methods & License -->
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="mada" class="h-6 opacity-90">
                            <svg class="w-12 h-6" viewBox="0 0 80 28" fill="none"><rect width="80" height="28" fill="none"/><text x="40" y="18" text-anchor="middle" fill="white" font-size="12" font-weight="bold">PayPal</text></svg>
                            <svg class="w-12 h-6" viewBox="0 0 80 28" fill="none"><rect width="80" height="28" fill="none"/><text x="40" y="18" text-anchor="middle" fill="white" font-size="12" font-weight="bold">MasterCard</text></svg>
                            <svg class="w-12 h-6" viewBox="0 0 80 28" fill="none"><rect width="80" height="28" fill="none"/><text x="40" y="18" text-anchor="middle" fill="white" font-size="12" font-weight="bold">VISA</text></svg>
                        </div>
                    </div>

                    <!-- License Number -->
                    <div class="text-center">
                        <p class="text-teal-100 text-sm">الرقم الضريبي : <span class="font-bold text-white">5667776443</span></p>
                    </div>

                    <!-- Logo -->
                    <div class="flex justify-end">
                        <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR Logo" class="h-12 opacity-90">
                    </div>
                </div>

                <!-- Copyright -->
                <div class="text-center text-teal-200 text-sm py-6">
                    <p>جميع الحقوق محفوظة في جار © {{ date('Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Decorative Pattern Bottom - Full Width -->
        <div style="width:100vw; overflow:hidden; margin-left:calc(50% - 50vw); margin-right:calc(50% - 50vw); height:2rem;">
            <img src="{{ asset('images/Images/TJAR-PATTERN_PATTERN 2 (1) 1.png') }}" alt="pattern" style="width:100%; height:100%; object-fit:cover; display:block;">
        </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenu = document.getElementById('user-menu');
            if (userMenu) {
                const dropdown = userMenu.querySelector('.dropdown');
                let timeout;

                userMenu.addEventListener('mouseenter', function() {
                    clearTimeout(timeout);
                    dropdown.classList.remove('hidden');
                });

                userMenu.addEventListener('mouseleave', function() {
                    timeout = setTimeout(() => {
                        dropdown.classList.add('hidden');
                    }, 200);
                });
            }
        });
    </script>
</body>
</html>
