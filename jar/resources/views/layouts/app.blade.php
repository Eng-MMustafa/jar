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
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/50x50" alt="Logo" class="w-10 h-10 mr-3">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-green-600">تي جار</a>
                </div>
                <nav class="hidden md:flex space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition duration-300">الرئيسية</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-green-600 transition duration-300">المنتجات</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">عن الشركة</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">اتصل بنا</a>
                </nav>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-green-600 transition duration-300">السلة</a>
                    @auth
                        <span class="text-gray-700">مرحباً، {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-green-600 transition duration-300">تسجيل الخروج</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 transition duration-300">تسجيل الدخول</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">إنشاء حساب</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">تي جار</h3>
                    <p class="text-gray-300 mb-4">منصة التأجير الأولى في مصر</p>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="#" class="text-gray-300 hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="text-gray-300 hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">روابط سريعة</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">الرئيسية</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white">المنتجات</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">عن الشركة</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">الفئات</h4>
                    <ul class="space-y-2">
                        @foreach(\App\Models\Category::take(5)->get() as $category)
                        <li><a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-gray-300 hover:text-white">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">معلومات الاتصال</h4>
                    <p class="text-gray-300 mb-2">البريد الإلكتروني: info@tigar.com</p>
                    <p class="text-gray-300 mb-2">الهاتف: +20 123 456 7890</p>
                    <p class="text-gray-300">العنوان: القاهرة، مصر</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300">&copy; 2024 تي جار. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>
