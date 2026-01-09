<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'ايجار'))</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}">
    <link rel="shortcut icon" href="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}">
    <!-- Custom Auth Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <header>
    <!-- Top Bar -->
    <div class="bg-white border-b border-gray-100 hidden md:block">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-2 text-xs lg:text-sm">
                <!-- Right: Contact -->
                <div class="flex items-center gap-4">
                    <a href="tel:+966556734562" class="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                        <img src="{{ asset('images/Icons/call.svg') }}" class="w-4 h-4" alt="phone">
                        <span class="font-medium font-sans" dir="ltr">+966556734562</span>
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="mailto:Support@tjar.sa" class="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                        <i class="fa-regular fa-envelope text-lg"></i>
                        <span class="font-medium font-sans">Support@tjar.sa</span>
                    </a>
                </div>

                <!-- Left: Settings & Social -->
                <div class="flex items-center gap-6">
                    <!-- Social Icons -->
                    <div class="flex items-center gap-2">
                         <a href="#" class="w-7 h-7 flex items-center justify-center rounded text-black hover:text-black transition-all">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="#" class="w-7 h-7 flex items-center justify-center rounded text-black hover:text-black transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-7 h-7 flex items-center justify-center rounded text-black hover:text-black transition-all">
                            <i class="fa-brands fa-snapchat"></i>
                        </a>
                        <a href="#" class="w-7 h-7 flex items-center justify-center rounded text-black hover:text-black transition-all">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-2 text-gray-600 cursor-pointer hover:text-teal-600">
                        <img src="{{ asset('images/Icons/Map Point.svg') }}" class="w-4 h-4" alt="location">
                        <span>القصيم - بريدة</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>

                    <!-- Language -->
                    <div class="flex items-center gap-2 text-gray-600 cursor-pointer hover:text-teal-600">
                        <img src="{{ asset('images/Icons/flag-for-saudi-arabia-svgrepo-com 1.svg') }}" class="w-5 h-3.5 object-cover rounded-[2px]" alt="KSA">
                        <span>العربية</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle Bar -->
    <div class="bg-teal-600 md:bg-white py-2 border-b border-gray-100">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                <div class="flex items-center justify-between w-full md:hidden">
                    <!-- Left group: user/auth -->
                    <div class="flex items-center gap-2 text-white order-2 relative">
                        @guest
                            <a href="{{ route('login') }}" class="w-9 h-9 rounded-full flex items-center justify-center border border-white/60 bg-white/10">
                                <img src="{{ asset('images/Icons/User.svg') }}" class="w-5 h-5 brightness-0 invert" alt="user">
                            </a>
                            <div class="flex flex-col leading-tight">
                                <span class="text-sm text-white">مرحبا بك</span>
                                <a href="{{ route('login') }}" class="text-sm font-bold text-white">تسجيل دخول</a>
                            </div>
                        @else
                            <button id="mobile-user-trigger" class="flex items-center gap-2">
                                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatar.svg') }}" class="w-9 h-9 rounded-full object-cover border border-white/60 bg-white/10" onerror="this.src='{{ asset('images/placeholder.svg') }}'">
                                <div class="flex flex-col leading-tight text-right">
                                    <span class="text-xs text-white/90">مرحبا بك</span>
                                    <span class="text-sm font-bold flex items-center gap-1">
                                        <span class="truncate max-w-[120px]">{{ Auth::user()->name }}</span>
                                        <i class="fa-solid fa-chevron-down text-[10px] opacity-90"></i>
                                    </span>
                                </div>
                            </button>
                            <!-- Mobile user dropdown -->
                            <div id="mobile-user-dropdown" class="hidden absolute top-full left-0 mt-2 w-48 rounded-md shadow-lg bg-white text-gray-800 z-50">
                                <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">الملف الشخصي</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">الإعدادات</a>
                                <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-200">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">تسجيل الخروج</button>
                                </form>
                            </div>
                        @endguest
                    </div>
                    <!-- Right group: menu then white logo -->
                    <div class="flex items-center gap-3 order-1">
                        <button id="mobile-menu-btn" class="text-white p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <a href="{{ route('home') }}" class="flex-shrink-0">
                            <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR" class="h-8 w-auto brightness-0 invert">
                        </a>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="hidden md:block flex-shrink-0 -ml-4 md:-ml-6">
                    <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR" class="h-10 md:h-28 w-auto">
                </a>

                <!-- Center: Search -->
                <div class="order-2 w-full md:order-none md:flex-1 md:max-w-3xl">
                    <div class="relative group">
                        <input type="text"
                               placeholder="إبحث عن : أجهزة كهربائية"
                               class="w-full py-3 px-12 text-right bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all placeholder-gray-400 text-gray-600">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <img src="{{ asset('images/Icons/Rounded Magnifer.svg') }}" class="w-5 h-5 text-gray-400" alt="search">
                        </div>
                    </div>
                </div>

                <!-- Left: User/Login -->
                <div class="hidden md:flex flex-shrink-0 text-white md:text-inherit">
                    @guest
                        <a href="{{ route('login') }}" class="flex items-center gap-3 group">
                            <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center group-hover:bg-teal-50 transition-all">
                                <img src="{{ asset('images/Icons/User.svg') }}" class="w-5 h-5" alt="user">
                            </div>
                            <div class="text-right">
                                <p class="text-xs md:text-gray-500 mb-0.5">مرحبا بك</p>
                                <p class="text-sm font-bold md:text-gray-800 group-hover:text-teal-600 transition-colors">تسجيل دخول</p>
                            </div>
                        </a>
                    @else
                        <div class="relative group" id="user-menu">
                            <button class="flex items-center gap-3 text-gray-700 hover:text-gray-900">
                                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatar.svg') }}" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" onerror="this.src='{{ asset('images/placeholder.svg') }}'">
                                <div class="text-left">
                                    <div class="text-xs text-gray-500 mb-0.5">مرحبا بك</div>
                                    <div class="font-bold text-sm leading-none flex items-center gap-1">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                    </div>
                                </div>
                            </button>
                            <div class="absolute dropdown hidden bg-white shadow-xl rounded-lg left-0 mt-2 min-w-56 z-50 border border-gray-200 overflow-hidden">
                                <a href="{{ route('profile.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <i class="fa-regular fa-user w-4 h-4"></i>
                                        <span>البروفيل</span>
                                    </div>
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <i class="fa-solid fa-gear w-4 h-4"></i>
                                        <span>الإعدادات</span>
                                    </div>
                                </a>
                                <hr class="border-gray-200">
                                <a href="{{ route('cart.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <i class="fa-solid fa-cart-shopping w-4 h-4"></i>
                                        <span>سلة التسوق</span>
                                    </div>
                                </a>
                                <a href="{{ route('profile.bookings') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-teal-600 transition duration-200">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <i class="fa-solid fa-clipboard-list w-4 h-4"></i>
                                        <span>طلباتى</span>
                                    </div>
                                </a>
                                <hr class="border-gray-200">
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 hover:text-red-700 transition duration-200">
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <i class="fa-solid fa-arrow-right-from-bracket w-4 h-4"></i>
                                            <span>تسجيل الخروج</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar (Navigation) -->
    <nav class="bg-[#009595] text-white main-nav hidden md:block">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="nav-links flex items-center justify-start h-12 gap-8 text-[15px]">
                <a href="{{ route('home') }}" class="text-white hover:text-white focus:text-white active:text-white visited:text-white opacity-100 font-medium pb-0.5 border-b-2 border-white">الرئيسية</a>
                <a href="{{ route('about') }}" class="text-white hover:text-white focus:text-white active:text-white visited:text-white opacity-100 font-medium pb-0.5 hover:border-b-2 hover:border-white">من نحن</a>

                <!-- Categories Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-2 text-white hover:text-white focus:text-white active:text-white opacity-100 font-medium hover:border-b-2 hover:border-white pb-0.5 transition-colors py-0">
                        <span>الأقسام</span>
                        <i class="fa-solid fa-chevron-down text-xs text-white"></i>
                    </button>
                     <div class="absolute hidden group-hover:block top-full right-0 w-56 bg-white rounded-b-lg shadow-xl z-50 py-2 text-gray-800">
                          @php
                                $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->take(8)->get();
                            @endphp
                            @if($categories->count() > 0)
                                @foreach($categories as $cat)
                                    <a href="{{ route('categories.show', $cat->slug) }}" class="block px-4 py-2 hover:bg-gray-50 hover:text-teal-600 text-sm transition-colors">{{ $cat->name }}</a>
                                @endforeach
                            @else
                                <span class="block px-4 py-2 text-gray-500 text-sm">لا توجد أقسام متاحة</span>
                            @endif
                     </div>
                </div>

                <a href="{{ route('products.index') }}" class="text-white hover:text-white focus:text-white active:text-white visited:text-white opacity-100 font-medium pb-0.5 hover:border-b-2 hover:border-white">أحدث المنتجات</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-white focus:text-white active:text-white visited:text-white opacity-100 font-medium pb-0.5 hover:border-b-2 hover:border-white">تواصل معنا</a>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Drawer) -->
    <div id="mobile-menu" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="mobile-menu-overlay" class="absolute inset-0 bg-black/30"></div>
        <div id="mobile-menu-panel" class="absolute right-0 top-0 h-full w-72 bg-white shadow-xl transform translate-x-full transition-all">
            <div class="flex items-center justify-between px-4 py-4 border-b">
                <h3 class="text-lg font-bold">لوحة التنقل</h3>
                <button id="mobile-menu-close" class="text-red-500 p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="px-4 py-4 space-y-4">
                <a href="{{ route('home') }}" class="block py-2 text-teal-600 font-medium">الرئيسية</a>
                <a href="{{ route('about') }}" class="block py-2">من نحن</a>
                <a id="mobile-categories-toggle" href="#" class="block py-2 flex items-center justify-between">
                    <span>الأقسام</span>
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </a>
                <div id="mobile-categories" class="hidden pl-3">
                    @php
                        $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->take(8)->get();
                    @endphp
                    @if($categories->count() > 0)
                        @foreach($categories as $cat)
                            <a href="{{ route('categories.show', $cat->slug) }}" class="block py-1 text-sm text-gray-700 hover:text-teal-600">{{ $cat->name }}</a>
                        @endforeach
                    @else
                        <span class="block py-1 text-sm text-gray-500">لا توجد أقسام متاحة</span>
                    @endif
                </div>
                <a href="{{ route('products.index') }}" class="block py-2">أحدث المنتجات</a>
                <a href="{{ route('contact') }}" class="block py-2">تواصل معنا</a>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/Icons/flag-for-saudi-arabia-svgrepo-com 1.svg') }}" class="w-5 h-3.5 object-cover rounded-[2px]" alt="KSA">
                        <span>العربية</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/Icons/Map Point.svg') }}" class="w-4 h-4" alt="location">
                        <span>القصيم - بريدة</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
                <div class="flex items-center gap-3 pt-2 justify-center">
                    <a href="#" class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded text-gray-500">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded text-gray-500">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded text-gray-500">
                        <i class="fa-brands fa-snapchat"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded text-gray-500">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="mt-auto px-4 py-4 border-t">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-right py-2 text-red-600">تسجيل خروج</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Menu Button (For smaller screens) -->
    <button id="mobile-menu-btn" class="hidden md:hidden fixed top-4 left-4 z-50 bg-teal-500 text-white p-2 rounded-lg shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</header>

    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const panel = document.getElementById('mobile-menu-panel');
        const overlay = document.getElementById('mobile-menu-overlay');
        const closeBtn = document.getElementById('mobile-menu-close');
        function openMenu() {
            menu.classList.remove('hidden');
            requestAnimationFrame(() => {
                panel.classList.remove('translate-x-full');
            });
        }
        function closeMenu() {
            panel.classList.add('translate-x-full');
            setTimeout(() => menu.classList.add('hidden'), 200);
        }
        menuBtn?.addEventListener('click', openMenu);
        closeBtn?.addEventListener('click', closeMenu);
        overlay?.addEventListener('click', closeMenu);
        const catToggle = document.getElementById('mobile-categories-toggle');
        const catList = document.getElementById('mobile-categories');
        catToggle?.addEventListener('click', function(e) {
            e.preventDefault();
            catList?.classList.toggle('hidden');
        });
        // Mobile user dropdown toggle
        const mobileUserTrigger = document.getElementById('mobile-user-trigger');
        const mobileUserDropdown = document.getElementById('mobile-user-dropdown');
        if (mobileUserTrigger && mobileUserDropdown) {
            mobileUserTrigger.addEventListener('click', function(e){
                e.stopPropagation();
                mobileUserDropdown.classList.toggle('hidden');
            });
            mobileUserDropdown.addEventListener('click', function(e){ e.stopPropagation(); });
            document.addEventListener('click', function(){ mobileUserDropdown.classList.add('hidden'); });
        }
    </script>

    <main>
        @yield('content')
    </main>

    <style>
        .main-nav .nav-links > a,
        .main-nav .nav-links > a:hover,
        .main-nav .nav-links > a:focus,
        .main-nav .nav-links > a:active,
        .main-nav .nav-links > a:visited {
            color: #fff !important;
        }
        .main-nav .nav-links > .relative > button,
        .main-nav .nav-links > .relative > button:hover,
        .main-nav .nav-links > .relative > button:focus {
            color: #fff !important;
        }
        .main-nav .nav-links > .relative > button i {
            color: #fff !important;
        }
        .footer-bg-container {
            position: relative;
            background-color: #003838;
            overflow: hidden;
        }
        .footer-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            background-repeat: repeat; /* Changed to repeat for better coverage */
            background-position: center top;
            background-size: 500px auto; /* Set a reasonable fixed size for the pattern */
            opacity: 0.5; /* High opacity to ensure visibility */
            pointer-events: none;
            /* Default (Mobile) */
            background-image: url('{{ asset('images/Images/TJAR-PATTERN_WHITE (2) 1.png') }}');
        }
        @media (min-width: 768px) {
            .footer-pattern {
                /* Desktop */
                background-image: url('{{ asset('images/Images/TJAR-PATTERN_WHITE (2) 1.png') }}');
                background-size: 600px auto; /* Slightly larger on desktop */
                background-repeat: repeat;
                opacity: 0.5;
            }
        }
    </style>
    <footer class="site-footer text-white pt-16 pb-0 relative z-10 font-ibm footer-bg-container">
        <div class="footer-pattern"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12 text-right" dir="rtl">
                <!-- Column 1: Summary (Rightmost) -->
                <div class="footer-col border-b border-teal-800/30 pb-6 mb-6 md:border-none md:pb-0 md:mb-0 hidden md:block">
                    <h3 class="text-lg font-medium mb-6 pb-2 text-white border-b border-teal-600/30 inline-block">ملخص</h3>
                    <h4 class="text-base font-medium text-white mb-2">تي جار لتأجير الممتلكات</h4>
                    <p class="text-white text-sm leading-relaxed mb-6">
                        شركة سعودية متخصصة تعمل كوسيط موثوق لتأجير مختلف أنواع الممتلكات، حيث تربط بين الملاك والمستأجرين عبر منصة سهلة الاستخدام تضمن السرعة، الأمان، ووضوح الإجراءات.
                    </p>
                    <div class="flex gap-3 justify-start" aria-label="social links">
                        <!-- TikTok -->
                        <a href="#" class="social-btn w-10 h-10 rounded-lg border border-teal-500/50 flex items-center justify-center hover:bg-teal-600 transition text-white">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="social-btn w-10 h-10 rounded-lg border border-teal-500/50 flex items-center justify-center hover:bg-teal-600 transition text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <!-- Snapchat -->
                        <a href="#" class="social-btn w-10 h-10 rounded-lg border border-teal-500/50 flex items-center justify-center hover:bg-teal-600 transition text-white">
                            <i class="fab fa-snapchat-ghost"></i>
                        </a>
                        <!-- X (Twitter) -->
                        <a href="#" class="social-btn w-10 h-10 rounded-lg border border-teal-500/50 flex items-center justify-center hover:bg-teal-600 transition text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Important Links -->
                <div class="footer-col border-b border-teal-800/30 pb-6 mb-6 md:border-none md:pb-0 md:mb-0">
                    <h3 class="text-lg font-medium mb-3 pb-2 text-white border-b border-teal-600/30 inline-block">روابط مهمة</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="{{ route('home') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">من نحن</a></li>
                        <li><span class="text-white block py-0.5 cursor-default font-ibm font-normal text-sm leading-5 tracking-wide">الأقسام الرئيسية</span></li>
                        <li><a href="{{ route('products.index') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">أحدث المنتجات</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- Column 3: Common Categories -->
                <div class="footer-col border-b border-teal-800/30 pb-6 mb-6 md:border-none md:pb-0 md:mb-0">
                    <h3 class="text-lg font-medium mb-3 pb-2 text-white border-b border-teal-600/30 inline-block">الفئات الشائعة</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">إلكترونيات</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">العاب</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">المنزل</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">أغراض التخيم</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">أغراض البحر والبر</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Support -->
                <div class="footer-col hidden md:block">
                    <h3 class="text-lg font-medium mb-3 pb-2 text-white border-b border-teal-600/30 inline-block">الاتصال والدعم</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">مركز العملاء</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">تواصل معنا</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">شارك معنا</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">تقديم شكوى</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">الإبلاغ عن مشكلة</a></li>
                    </ul>
                </div>
            </div>
            <div class="block md:hidden border-t border-teal-800/30 pt-6 mt-6">
                <div class="footer-col">
                    <h3 class="text-lg font-medium mb-3 pb-2 text-white border-b border-teal-600/30 inline-block">الاتصال والدعم</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">مركز العملاء</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">تواصل معنا</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">شارك معنا</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">تقديم شكوى</a></li>
                        <li><a href="#" class="text-white hover:text-teal-200 transition block py-0.5 font-ibm font-normal text-sm leading-5 tracking-wide">الإبلاغ عن مشكلة</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Section: Logo, Payments, Copyright -->
            <div class="border-t border-teal-800/50 pt-8 pb-8" dir="rtl">
                <div class="md:hidden flex flex-col gap-6">
                    <div class="flex items-center gap-2 justify-center">
                        <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                            <img src="{{ asset('images/images/image (4).png') }}" alt="Visa">
                        </div>
                        <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                            <img src="{{ asset('images/images/image (3).png') }}" alt="Visa">
                        </div>
                        <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                            <img src="{{ asset('images/images/paypal-footer.svg') }}" alt="PayPal">
                        </div>
                        <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                            <img src="{{ asset('images/images/mada-footer.svg') }}" alt="Mada">
                        </div>
                    </div>
                    <div class="text-white text-sm font-medium text-right">
                        الرقم الضريبي : <span class="font-bold">546233552</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR Logo" class="h-24 w-auto brightness-0 invert">
                        </div>
                        <div class="text-white text-sm font-medium">
                            جميع الحقوق محفوظة لمنصة تي جار © 2026
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex flex-row justify-between items-center gap-6">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/Logo/TJAR-LOGO-V31-01 1.svg') }}" alt="TJAR Logo" class="h-24 w-auto brightness-0 invert">
                        </div>
                        <div class="flex flex-col items-end gap-4">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-2 text-xs text-white">
                                    <img src="{{ asset('images/images/photo_2021-11-21_10-54-47 1.svg') }}" alt="Mada">
                                    <span>الرقم الضريبي : <span class="font-bold">546233552</span></span>
                                </div>
                                <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                                    <img src="{{ asset('images/images/visa-1.png') }}" alt="Visa">
                                </div>
                                <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                                    <img src="{{ asset('images/images/visa-2.png') }}" alt="Visa">
                                </div>
                                <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                                    <img src="{{ asset('images/images/image.svg') }}" alt="PayPal">
                                </div>
                                <div class="bg-white rounded h-8 w-12 flex items-center justify-center p-1">
                                    <img src="{{ asset('images/images/image2.svg') }}" alt="Mada">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-white text-sm font-medium text-center mt-6">
                        جميع الحقوق محفوظة لمنصة تي جار © 2026
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Pattern Strip -->
        <div class="w-full h-4 overflow-hidden relative z-10">
            <img src="{{ asset('images/images/TJAR-PATTERN_PATTERN 2 (1) 1.png') }}" alt="pattern" class="w-full h-full object-cover opacity-100">
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenu = document.getElementById('user-menu');
            if (!userMenu) return;
            const dropdown = userMenu.querySelector('.dropdown');
            const trigger = userMenu.querySelector('button');
            function open() { dropdown.classList.remove('hidden'); }
            function close() { dropdown.classList.add('hidden'); }
            trigger.addEventListener('click', function(e) { e.stopPropagation(); dropdown.classList.toggle('hidden'); });
            dropdown.addEventListener('click', function(e) { e.stopPropagation(); });
            document.addEventListener('click', close);
        });
    </script>
</body>
</html>
