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
        <div class="bg-white border-b border-gray-300">
            <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between text-xs text-gray-600 py-2">
                    <!-- Right: Language -->
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <button class="text-gray-700 hover:text-gray-900">العربية</button>
                        <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                        </svg>
                        <span class="text-gray-400">|</span>
                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98"/>
                        </svg>
                        <span class="hidden sm:inline text-gray-700">بريدة - القصيم</span>
                    </div>

                    <!-- Center: Social Icons -->
                    <div class="hidden md:flex items-center space-x-3 space-x-reverse text-gray-500">
                        <a href="#" class="hover:text-gray-700 text-lg">𝕏</a>
                        <a href="#" class="hover:text-gray-700">🔔</a>
                        <a href="#" class="hover:text-gray-700">📷</a>
                        <a href="#" class="hover:text-gray-700">🎵</a>
                    </div>

                    <!-- Left: Contact -->
                    <div class="flex items-center space-x-2 sm:space-x-4 space-x-reverse">
                        <a href="mailto:Support@tjar.sa" class="text-teal-700 font-medium hover:text-teal-800 text-xs sm:text-sm">Support@tjar.sa</a>
                        <a href="tel:+966556734562" class="text-teal-700 font-medium hover:text-teal-800 text-xs sm:text-sm">+966556734562</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="bg-teal-700">
            <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Left: Logo -->
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR" class="h-10 w-auto">
                    </a>

                    <!-- Center: Search -->
                    <div class="hidden md:block flex-1 px-8">
                        <div class="relative">
                            <input type="search" placeholder="ابحث عن : أجهزة كهربائية" class="w-full rounded-full py-2 px-4 text-sm bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                            <button class="absolute inset-y-0 left-3 text-gray-500">
                                <img src="{{ asset('images/Icons/Rounded Magnifer.svg') }}" alt="search" class="w-5 h-5">
                            </button>
                        </div>
                    </div>

                    <!-- Right: Menu + Auth -->
                    <div class="hidden lg:flex items-center space-x-6 space-x-reverse">
                        <a href="{{ route('home') }}" class="text-white font-medium hover:text-emerald-200">الرئيسية</a>
                        <a href="{{ route('about') }}" class="text-white font-medium hover:text-emerald-200">من نحن</a>
                        <div class="relative group">
                            <button class="text-white font-medium hover:text-emerald-200 flex items-center space-x-1 space-x-reverse">
                                <span>الأقسام</span>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </button>
                            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md right-0 mt-0 w-56 z-50">
                                @foreach(\App\Models\Category::take(8)->get() as $cat)
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-emerald-50 text-sm first:rounded-t-md last:rounded-b-md">{{ $cat->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="#" class="text-white font-medium hover:text-emerald-200">أحدث المنتجات</a>
                        <a href="#" class="text-white font-medium hover:text-emerald-200">تواصل معنا</a>
                        <span class="border-l border-emerald-600"></span>
                        @auth
                            <img src="{{ asset('images/Icons/User.svg') }}" alt="user" class="w-6 h-6">
                        @else
                            <a href="{{ route('login') }}" class="text-white font-medium">تسجيل دخول</a>
                        @endauth
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="lg:hidden flex items-center space-x-2">
                        @auth
                            <img src="{{ asset('images/Icons/User.svg') }}" alt="user" class="w-6 h-6">
                        @endauth
                        <button id="mobile-menu-btn" class="text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Search -->
                <div class="md:hidden pb-3">
                    <div class="relative">
                        <input type="search" placeholder="ابحث..." class="w-full rounded-full py-2 px-4 text-sm bg-white placeholder-gray-500">
                        <button class="absolute inset-y-0 left-3 text-gray-500">
                            <img src="{{ asset('images/Icons/Rounded Magnifer.svg') }}" alt="search" class="w-5 h-5">
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden lg:hidden bg-teal-600 pb-3">
                    <a href="{{ route('home') }}" class="block px-4 py-2 text-white hover:bg-teal-800">الرئيسية</a>
                    <a href="{{ route('about') }}" class="block px-4 py-2 text-white hover:bg-teal-800">من نحن</a>
                    <a href="#" class="block px-4 py-2 text-white hover:bg-teal-800">الأقسام</a>
                    <a href="#" class="block px-4 py-2 text-white hover:bg-teal-800">أحدث المنتجات</a>
                    <a href="#" class="block px-4 py-2 text-white hover:bg-teal-800">تواصل معنا</a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-right px-4 py-2 text-white hover:bg-teal-800">تسجيل الخروج</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-teal-800">تسجيل دخول</a>
                    @endauth
                </div>
            </div>
        </nav>
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
