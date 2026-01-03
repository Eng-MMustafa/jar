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

                    <!-- Left: Welcome and Login -->
                    <div class="flex items-center space-x-6 space-x-reverse">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">تسجيل دخول</a>
                        @else
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-900">تسجيل خروج</button>
                            </form>
                        @endguest
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <button class="text-gray-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </button>
                            <span class="text-gray-700">مرحباً بك</span>
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="bg-teal-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-start h-12 space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200" style="color: white !important;">الرئيسية</a>
                    <a href="#" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200" style="color: white !important;">من نحن</a>
                    <div class="relative group">
                        <button class="!text-white hover:!text-teal-100 font-medium text-sm flex items-center space-x-1 space-x-reverse transition duration-200" style="color: white !important;">
                            <span>الأقسام</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md right-0 mt-1 w-56 z-50 border border-gray-100">
                            @foreach(\App\Models\Category::take(8)->get() as $cat)
                                <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-teal-50 text-sm border-b border-gray-50 last:border-b-0 first:rounded-t-md last:rounded-b-md transition duration-200">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="#" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200" style="color: white !important;">أحدث المنتجات</a>
                    <a href="#" class="!text-white hover:!text-teal-100 font-medium text-sm transition duration-200" style="color: white !important;">تواصل معنا</a>
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
                <a href="#" class="block py-2 text-white hover:text-teal-100">من نحن</a>
                <a href="#" class="block py-2 text-white hover:text-teal-100">الأقسام</a>
                <a href="#" class="block py-2 text-white hover:text-teal-100">أحدث المنتجات</a>
                <a href="#" class="block py-2 text-white hover:text-teal-100">تواصل معنا</a>
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

    <footer class="site-footer text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-sm">
                <div class="footer-col">
                    <h3 class="text-lg font-bold mb-4">ملخص</h3>
                    <p class="text-teal-100 leading-relaxed">تي جار لتأجير الممتلكات
شركة سعودية متخصصة تعمل كوسيط موثوق لتأجير مختلف أنواع الممتلكات، حيث تربط بين الملاك والمستأجرين عبر منصة سهلة الاستخدام تضمن السرعة، الأمان، ووضوح الإجراءات.</p>
                    <div class="mt-4 flex space-x-3">
                        <button class="footer-social w-8 h-8 rounded border border-teal-200/30 flex items-center justify-center">✕</button>
                        <button class="footer-social w-8 h-8 rounded border border-teal-200/30 flex items-center justify-center">⒮</button>
                        <button class="footer-social w-8 h-8 rounded border border-teal-200/30 flex items-center justify-center">◎</button>
                        <button class="footer-social w-8 h-8 rounded border border-teal-200/30 flex items-center justify-center">♪</button>
                    </div>
                </div>

                <div class="footer-col">
                    <h4 class="text-lg font-semibold mb-4">روابط سريعة</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-teal-100 hover:text-white">الرئيسية</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-teal-100 hover:text-white">من نحن</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white">الأقسام الرئيسية</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white">أحدث المنتجات</a></li>
                        <li><a href="#" class="text-teal-100 hover:text-white">تواصل معنا</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="text-lg font-semibold mb-4">الفئات الشائعة</h4>
                    <ul class="space-y-2">
                        @foreach(\App\Models\Category::take(6)->get() as $category)
                        <li><a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-teal-100 hover:text-white">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="text-lg font-semibold mb-4">الاتصال والدعم</h4>
                    <ul class="space-y-2 text-teal-100">
                        <li>مركز العملاء</li>
                        <li>تواصل معنا</li>
                        <li>شارك معنا</li>
                        <li>تقديم شكوى</li>
                        <li>الإبلاغ عن مشكلة</li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 border-t border-teal-700 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="payments flex items-center space-x-4">
                    <img src="{{ asset('images/login/Frame 1597883802.png') }}" alt="mada" class="h-8 opacity-90">
                    <img src="https://via.placeholder.com/80x28?text=PayPal" alt="paypal" class="h-8">
                    <img src="https://via.placeholder.com/80x28?text=Mastercard" alt="mastercard" class="h-8">
                    <img src="https://via.placeholder.com/80x28?text=Visa" alt="visa" class="h-8">
                </div>

                <div class="text-teal-100 text-sm md:text-base">الرقم الضريبي : <span class="font-semibold">5667776443</span></div>

                <div class="text-center md:text-right w-full md:w-auto">
                    <p class="text-teal-100">&copy; {{ date('Y') }} تي جار. جميع الحقوق محفوظة.</p>
                </div>

                <div class="w-28 md:w-36 ml-auto md:ml-0">
                    <img src="{{ asset('images/login/path8.png') }}" alt="tjar logo" class="w-full h-auto opacity-90">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
