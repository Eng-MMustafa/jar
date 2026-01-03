@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="direction: rtl;">
    <div class="w-full max-w-md mx-auto bg-white rounded-3xl shadow-xl p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo/TJAR-LOGO-V1-01 1.svg') }}" alt="TJAR Logo" class="w-20 h-20 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-teal-600 mb-2">تحقق من بريدك</h2>
            <p class="text-gray-600 text-sm">نحتاج منك التحقق من بريدك الإلكتروني لإكمال التسجيل</p>
        </div>

        @if (session('resent'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm text-green-700">تم إرسال رابط التحقق الجديد إلى بريدك الإلكتروني.</p>
            </div>
        @endif

        <div class="space-y-6">
            <div class="text-center">
                <p class="text-gray-600 mb-4">
                    قبل المتابعة، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.
                </p>
                
                <p class="text-gray-600">
                    إذا لم تستقبل البريد الإلكتروني، 
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="text-teal-600 hover:text-teal-700 font-semibold underline">
                            اضغط هنا لطلب رابط جديد
                        </button>
                    </form>
                </p>
            </div>

            <!-- Back to Login -->
            <div class="text-center pt-6 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-teal-600 hover:text-teal-700 font-semibold">
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
