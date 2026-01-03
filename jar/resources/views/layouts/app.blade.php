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
        <!-- Top thin bar -->
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between text-sm text-gray-600 py-2">
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="flex items-center"> 
                            <span class="mr-2">القصيم - بريدة</span>
                            <button class="text-gray-500 hover:text-gray-700">العربية</button>
                        </div>
                        <div class="hidden sm:flex items-center space-x-3 text-gray-400">
                            <button aria-label="snapchat" class="hover:text-gray-700">🔗</button>
                            <button aria-label="instagram" class="hover:text-gray-700">🔗</button>
                            <button aria-label="tiktok" class="hover:text-gray-700">🔗</button>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6 space-x-reverse text-teal-700">
                        <a href="mailto:Support@tjar.sa" class="hover:underline">Support@tjar.sa</a>
                        <a href="tel:+966556734562" class="hover:underline">+966556734562</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main nav -->
        <div class="bg-emerald-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <div class="flex items-center md:space-x-8 space-x-reverse">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img src="{{ asset('images/login/path8.png') }}" alt="Logo" class="w-24 h-auto ml-4">
                        </a>
                        <nav class="hidden lg:flex items-center space-x-6 text-white text-sm">
                            <a href="{{ route('home') }}" class="hover:underline">الرئيسية</a>
                            <a href="#" class="hover:underline">الأقسام</a>
                            <a href="#" class="hover:underline">أحدث المنتجات</a>
                            <a href="#" class="hover:underline">تواصل معنا</a>
                        </nav>
                    </div>

                    <div class="flex-1 px-6">
                        <div class="max-w-lg mx-auto">
                            <div class="relative">
                                <input type="search" placeholder="ابحث عن : أجهزة كهربائية" class="w-full rounded-full py-3 px-4 text-sm bg-white placeholder-gray-400 focus:outline-none">
                                <button class="absolute inset-y-0 left-3 flex items-center text-gray-400">🔍</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 space-x-reverse">
                        <a href="{{ route('cart.index') }}" class="text-white hover:opacity-90">السلة</a>
                        @auth
                            <div class="text-white">مرحباً، {{ Auth::user()->name }}</div>
                            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-white">تسجيل الخروج</button></form>
                        @else
                            <a href="{{ route('login') }}" class="text-white">تسجيل دخول</a>
                            <a href="{{ route('register') }}" class="bg-white text-emerald-600 px-4 py-2 rounded-lg">إنشاء حساب</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

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
