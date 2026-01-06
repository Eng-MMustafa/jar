@extends('layouts.app')

@section('title', 'نجاح الإرسال')

@section('content')
<div class="max-w-3xl mx-auto p-6 text-center">
    <h1 class="text-2xl font-bold mb-4">تم إرسال إيصال التحويل</h1>

    <p class="text-gray-600">شكرًا، تم استلام إيصال التحويل وسنقوم بمراجعته. ستصلك رسالة عند التحقق.</p>

    <div class="mt-6">
        <a href="{{ route('profile.bookings') }}" class="btn btn-secondary">عرض حجوزاتي</a>
        <a href="{{ route('home') }}" class="btn btn-primary">العودة للصفحة الرئيسية</a>
    </div>
</div>
@endsection