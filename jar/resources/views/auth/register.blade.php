@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row" style="direction: rtl;">
        <!-- Left: Marketing / image area -->
        <div class="md:w-1/2 p-8 login-gradient border-r border-gray-100">
            <div class="h-full flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">انضم إلينا وابدأ إدارة ممتلكاتك بذكاء</h3>
                    <p class="text-gray-500">منصة موثوقة لإدارة وتأجير ممتلكاتك داخل المملكة بسهولة وأمان.</p>
                </div>

                <div class="mt-6 flex items-center justify-center">
                    <img src="{{ asset('images/login/illustration.png') }}" alt="illustration" class="rounded-xl shadow-md max-h-96">
                </div>

                <div class="mt-6 text-left">
                    <a href="#" class="inline-block bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-700 transition">في جار...</a>
                </div>
            </div>
        </div>

        <!-- Right: Register form -->
        <div class="md:w-1/2 p-8">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-6">
                    <img src="{{ asset('images/login/path8.png') }}" alt="logo" class="mx-auto mb-4">
                    <h2 class="text-xl font-semibold text-emerald-600">إنشاء حساب جديد</h2>
                    <p class="text-gray-500 text-sm mt-1">أدخل التفاصيل المطلوبة لإتمام إنشاء حسابك.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">الاسم كامل</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="ادخل الاسم كامل">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">رقم الجوال</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-gray-300 bg-gray-50 text-sm text-gray-600">+966</span>
                            <input name="phone" type="text" inputmode="tel" value="{{ old('phone') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="05xxxxxxxx">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">المدينة</label>
                        <select name="city" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400">
                            <option value="">اختر المدينة</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">كلمة المرور</label>
                        <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="********">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400" placeholder="********">
                    </div>

                    <div>
                        <button type="submit" class="w-full py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">إنشاء حساب</button>
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
                        هل لديك حساب من قبل؟ <a href="{{ route('login') }}" class="text-emerald-600 hover:underline">تسجيل الدخول</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
