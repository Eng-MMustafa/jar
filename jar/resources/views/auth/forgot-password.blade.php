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

            <!-- Right: Forgot Password form -->
            <div class="flex flex-col justify-center p-8 lg:p-12">
                <div class="max-w-sm mx-auto w-full">
                    <!-- Logo -->
                    <div class="text-center mb-8">
                        <img src="{{ asset('images/Logo/TJAR-LOGO-V1-01 1.svg') }}" alt="TJAR Logo" class="w-20 h-20 mx-auto mb-4">
                        <h2 class="text-2xl font-bold text-teal-600 mb-2">إعادة تعيين كلمة المرور</h2>
                        <p class="text-gray-600 text-sm">أدخل رقم جوالك لإرسال رمز التحقق</p>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                        @csrf

                        <!-- Phone Number -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> رقم الجوال
                            </label>
                            <div class="flex bg-white border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-teal-500 focus-within:border-transparent">
                                <div class="flex items-center px-4 bg-gray-50 border-l border-gray-300">
                                    <span class="text-sm font-semibold text-gray-700">+966</span>
                                </div>
                                <input 
                                    name="email" 
                                    type="tel" 
                                    inputmode="numeric"
                                    value="{{ old('email') }}" 
                                    required 
                                    class="flex-1 px-4 py-3 outline-none text-gray-900 placeholder-gray-400"
                                    placeholder="05xxxxxxxx"
                                >
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            إرسال رمز التحقق
                        </button>

                        <!-- Back to Login -->
                        <div class="text-center text-sm text-gray-600 pt-4 border-t border-gray-200">
                            تذكرت كلمة المرور؟ 
                            <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-700 font-semibold">تسجيل الدخول</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
