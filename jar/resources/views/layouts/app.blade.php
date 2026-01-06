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

                    <!-- Left: Language and Location -->
                    <div class="flex items-center space-x-6 space-x-reverse">
                        <div class="hidden md:flex items-center gap-3 mr-3">
                            <a href="#" class="p-2 bg-white rounded-lg shadow-sm hover:shadow-md text-gray-600 flex items-center justify-center" title="استكشف">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="p-2 bg-white rounded-lg shadow-sm hover:shadow-md text-gray-600 flex items-center justify-center" title="الإشعارات">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>
                            </a>
                            <a href="#" class="p-2 bg-white rounded-lg shadow-sm hover:shadow-md text-gray-600 flex items-center justify-center" title="انستجرام">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        </div>
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

                            <!-- Saudi flag next to language -->
                            <img src="{{ asset('images/Icons/flag-for-saudi-arabia-svgrepo-com 1.svg') }}" alt="علم السعودية" class="w-6 h-6 rounded-sm object-cover" style="border:1px solid rgba(0,0,0,0.06);">
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
                    <div class="flex-1 max-w-2xl mx-8">
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
                                    <button class="flex items-center gap-3 text-gray-700 hover:text-gray-900">
                                        <div class="text-right">
                                            <div class="font-semibold text-base leading-none">{{ Auth::user()->name ?? 'المستخدم' }}</div>
                                            <div class="text-sm text-gray-500 leading-none">{{ Auth::user()->city ?? 'القصيم - بريدة' }}</div>
                                        </div>

                                        <svg class="w-4 h-4 text-gray-500 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                        </svg>

                                        <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatar.svg') }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" onerror="this.src='{{ asset('images/placeholder.svg') }}'">
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
                                $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->take(8)->get();
                            @endphp
                            @if($categories->count() > 0)
                                @foreach($categories as $cat)
                                    <a href="{{ route('categories.show', $cat->slug) }}" class="block px-5 py-3 text-gray-700 hover:bg-teal-50 text-sm border-b border-gray-100 transition duration-200 flex items-center space-x-2 space-x-reverse group/item">
                                        <svg class="w-4 h-4 text-teal-500 opacity-0 group-hover/item:opacity-100" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.488 5.951 1.488a1 1 0 001.169-1.409l-7-14z"/>
                                        </svg>
                                        <span>{{ $cat->name }}</span>
                                    </a>
                                @endforeach

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

    <footer class="site-footer text-white py-12 relative z-10" style="background-color: #1a3a3a; background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,.03) 10px, rgba(255,255,255,.03) 20px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1: About -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">ملخص</h3>
                    <p class="text-teal-100 text-sm leading-relaxed mb-6">في جار لتأجير الممتلكات
شركة سعودية متخصصة تعمل كوسيط موثوق لتأجير مختلف أنواع الممتلكات، حيث تربط بين الملاك والمستأجرين عبر منصة سهلة الاستخدام تضمن السرعة، الأمان، ووضوح الإجراءات.</p>
                    <div class="flex gap-3" aria-label="social links">
                        <a href="#" aria-label="فيسبوك" title="فيسبوك" class="social-btn w-11 h-11 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                            <!-- Facebook -->
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22 12a10 10 0 10-11.5 9.9v-7h-2.3v-2.9h2.3V9.6c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .1 2 .1v2.2h-1.1c-1.1 0-1.4.7-1.4 1.4v1.7h2.4l-.4 2.9h-2v7A10 10 0 0022 12z"/>
                            </svg>
                            <span class="sr-only">فيسبوك</span>
                        </a>

                        <a href="#" aria-label="انستجرام" title="انستجرام" class="social-btn w-11 h-11 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                            <!-- Instagram -->
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37Z" fill="currentColor"></path>
                                <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"></circle>
                            </svg>
                            <span class="sr-only">انستجرام</span>
                        </a>

                        <a href="#" aria-label="لينكدإن" title="لينكدإن" class="social-btn w-11 h-11 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                            <!-- LinkedIn -->
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM0 8.98h4V24H0V8.98zM8.5 8.98h3.8v2.07h.05c.53-1 1.82-2.07 3.75-2.07 4.01 0 4.75 2.6 4.75 5.98V24H18V14.5c0-2.22-.04-5.07-3.09-5.07-3.09 0-3.56 2.42-3.56 4.92V24H8.5V8.98z"/>
                            </svg>
                            <span class="sr-only">لينكدإن</span>
                        </a>

                        <a href="#" aria-label="X" title="X" class="social-btn w-11 h-11 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                            <!-- X (Twitter) -->
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5v-.88A7.72 7.72 0 0023 3z"/>
                            </svg>
                            <span class="sr-only">X</span>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3 class="text-base font-bold mb-6 pb-2 border-b border-teal-600/50">روابط سريعة</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="text-teal-100 hover:text-white transition">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}" class="text-teal-100 hover:text-white transition">من نحن</a></li>
                        <li><span class="text-teal-100">الأقسام الرئيسية</span></li>
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
            <div class="pt-0">
            </div> 
        </div>

        <!-- Full-width extremes: tax number left and logo right (spanning page) -->
        <div class="w-full flex items-center justify-between mb-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <img src="{{ asset('images/Logo/TJAR-LOGO-V1-01 1.svg') }}" alt="TJAR Logo" class="h-40 w-auto opacity-100">
            </div>
            <div class="text-left text-teal-100 text-sm flex items-center gap-4">
                <p class="mb-0">الرقم الضريبي : <span class="font-bold text-white">5667776443</span></p>
                <div class="flex items-center gap-2" dir="ltr" aria-label="طرق الدفع">
                    <a href="#" aria-label="mada" title="mada" class="payment-btn w-8 h-8 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                        <img src="{{ asset('images/payments/mada-white.svg') }}" alt="MADA" class="w-6 h-6 object-contain">
                    </a>
                    <a href="#" aria-label="VISA" title="VISA" class="payment-btn w-8 h-8 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                        <img src="{{ asset('images/payments/visa-white.svg') }}" alt="VISA" class="w-6 h-6 object-contain">
                    </a>
                    <a href="#" aria-label="PayPal" title="PayPal" class="payment-btn w-8 h-8 rounded-md border border-white/20 bg-transparent flex items-center justify-center hover:bg-white/6 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/30" target="_blank" rel="noopener">
                        <img src="{{ asset('images/payments/paypal-white.svg') }}" alt="PayPal" class="w-6 h-6 object-contain">
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright (moved under full-width extremes) -->
        <div class="text-center text-teal-200 text-sm py-6">
            <p>جميع الحقوق محفوظة في جار © {{ date('Y') }}</p>
        </div>

        <!-- Decorative Pattern Bottom -->
        <div class="w-full h-10 overflow-hidden pointer-events-none">
            <img src="{{ asset('images/Images/TJAR-PATTERN_PATTERN 2 (1) 1.png') }}" alt="pattern" class="w-full h-full object-cover block">
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
