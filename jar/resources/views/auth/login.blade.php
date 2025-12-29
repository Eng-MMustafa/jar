@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row" style="direction: rtl;">
        <!-- Left: Marketing / image area -->
        <div class="md:w-1/2 p-8 bg-gradient-to-br from-emerald-50 to-white border-r border-gray-100">
            <div class="h-full flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">انضم إلينا وابدأ إدارة ممتلكاتك بذكاء</h3>
                    <p class="text-gray-500">منصة موثوقة لإدارة وتأجير ممتلكاتك داخل المملكة بسهولة وأمان.</p>
                </div>

                <div class="mt-6 flex items-center justify-center">
                    <img src="{{ asset('images/login/illustration.png') }}" alt="illustration" class="rounded-xl shadow-md">
                </div>

                <div class="mt-6 text-left">
                    <a href="#" class="inline-block bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-700 transition">في جار...</a>
                </div>
            </div>
        </div>

        <!-- Right: Login form -->
        <div class="md:w-1/2 p-8">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-6">
                    <img src="{{ asset('images/login/logo.svg') }}" alt="logo" class="mx-auto mb-4">
                    <h2 class="text-xl font-semibold text-emerald-600">تسجيل الدخول</h2>
                    <p class="text-gray-500 text-sm mt-1">أدخل رقم جوالك للمتابعة إلى حسابك.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">رقم الجوال</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-gray-300 bg-gray-50 text-sm text-gray-600">+966</span>
                            <input name="email" type="text" inputmode="tel" value="{{ old('email') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="05xxxxxxxx">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">كلمة المرور</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="********">
                            <div class="absolute inset-y-0 left-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-emerald-600 border-gray-300 rounded">
                            <label for="remember" class="mr-2 text-sm text-gray-700">تذكرني</label>
                        </div>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-emerald-600 hover:underline">هل نسيت كلمة المرور؟</a>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="w-full py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">تسجيل الدخول</button>
                    </div>

                    @if ($errors->any())
                        <div class="mt-2 text-sm text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="text-center text-sm text-gray-600">
                        هل تريد إنشاء حساب جديد؟ <a href="{{ route('register') }}" class="text-emerald-600 hover:underline">إنشاء حساب</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
