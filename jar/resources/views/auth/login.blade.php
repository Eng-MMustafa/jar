@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="direction: rtl;">
    <div class="w-full max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Left: Marketing / image area with light gradient -->
            <div class="hidden lg:flex flex-col justify-between p-12 bg-gradient-to-br from-cyan-50 via-teal-50 to-emerald-50" style="min-height: 600px;">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-3">انضم إلينا وابدأ إدارة ممتلكاتك بذكاء</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">منصة موثوقة لإدارة وتأجير ممتلكاتك داخل المملكة بسهولة وأمان...</p>
                </div>

                <div class="flex justify-center py-8">
                    <img src="{{ asset('images/Images/Frame 1597883798.png') }}" alt="Man with laptop" class="w-full max-w-md h-auto drop-shadow-lg">
                </div>
            </div>

            <!-- Right: Login form -->
            <div class="flex flex-col justify-center p-8 lg:p-12">
                <div class="max-w-sm mx-auto w-full">
                    <!-- Logo -->
                    <div class="text-center mb-8">
                        <img src="{{ asset('images/Logo/TJAR-LOGO-V1-01 1.svg') }}" alt="TJAR Logo" class="w-20 h-20 mx-auto mb-4">
                        <h2 class="text-2xl font-bold text-teal-600 mb-2">تسجيل الدخول</h2>
                        <p class="text-gray-600 text-sm">أدخل رقم جوالك للمتابعة إلى حسابك.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> رقم الجوال
                            </label>
                            <div class="flex bg-white border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-teal-500 focus-within:border-transparent">
                                <div class="flex items-center px-4 bg-gray-50 border-l border-gray-300">
                                    <span class="text-sm font-semibold text-gray-700">+966</span>
                                </div>
                                <input 
                                    name="phone" 
                                    type="tel" 
                                    inputmode="numeric"
                                    value="{{ old('phone') }}" 
                                    required 
                                    class="flex-1 px-4 py-3 outline-none text-gray-900 placeholder-gray-400"
                                    placeholder="05xxxxxxxx"
                                >
                            </div>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> كلمة المرور
                            </label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-gray-900 placeholder-gray-400"
                                    placeholder="••••••••"
                                >
                                <button type="button" onclick="togglePassword()" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-2 focus:ring-teal-500">
                                <span class="mr-2 text-sm text-gray-700">هل نسيت كلمة المرور؟</span>
                            </label>
                        </div>

                        @if ($errors->any())
                            <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                                <ul class="list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full py-3 px-4 bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-600 hover:to-emerald-600 text-white font-bold rounded-lg transition transform hover:scale-105 flex items-center justify-center"
                        >
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            تسجيل الدخول
                        </button>

                        <!-- Sign Up Link -->
                        <div class="text-center text-sm text-gray-600 pt-4 border-t border-gray-200">
                            هل تريد إنشاء حساب جديد؟ 
                            <a href="{{ route('register') }}" class="text-teal-600 hover:text-teal-700 font-semibold">إنشاء حساب</a>
                        </div>
                    </form>

                    <!-- Forgot Password Link -->
                    <div class="text-center mt-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-teal-600 hover:text-teal-700 font-semibold">
                                هل نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-4.803m5.604-1.888A3.375 3.375 0 1015.75 12m0 0a6.369 6.369 0 01-7.625 6.375"></path>';
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
        }
    }
</script>
@endsection
