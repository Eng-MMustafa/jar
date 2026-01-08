@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">طلبات الإيجار الجديدة</h1>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex gap-3 overflow-x-auto pb-2">
                <button class="px-4 py-2 bg-teal-600 text-white rounded-lg text-sm font-medium whitespace-nowrap">جميع الطلبات</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">موافق عليها</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">قيد الانتظار</button>
                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium whitespace-nowrap transition-colors">مرفوضة</button>
            </div>
        </div>
    </div>

    <!-- Orders List -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-4">
            @forelse($bookings as $booking)
                <div class="request-card bg-white rounded-lg shadow-sm border border-gray-100 p-4">
                    <div class="flex gap-4 items-start">
                        <div class="flex-1 text-right">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $booking->product?->name ?? 'منتج محجوز' }}</h3>
                                    <div class="text-sm text-gray-500 mt-1">المستأجر: <strong class="text-gray-800">{{ $booking->user?->getFullNameAttribute() ?? 'مستخدم' }}</strong></div>
                                    <div class="text-sm text-gray-500">من: {{ $booking->start_date->format('d - m - Y') }} إلى: {{ $booking->end_date->format('d - m - Y') }}</div>
                                </div>

                                <div class="w-36 text-left">
                                    @php $status = $booking->status; @endphp
                                    @if(in_array($status, ['approved','confirmed']))
                                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-50 text-green-700 border border-green-100">موافقة</span>
                                    @elseif(in_array($status, ['submitted','pending']))
                                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">قيد الإنتظار</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-50 text-red-700 border border-red-100">مرفوض</span>
                                    @endif

                                    <div class="mt-4 text-sm font-semibold text-teal-600">إجمالي السعر: {{ number_format($booking->total, 2) }} ر.س</div>
                                </div>
                            </div>

                            @if($booking->notes)
                                <div class="mt-3 p-3 bg-gray-50 rounded text-sm text-gray-700">{{ $booking->notes }}</div>
                            @endif

                            <div class="mt-4 flex gap-3">
                                @if($booking->status === 'pending' || $booking->status === 'submitted')
                                    <form action="{{ route('bookings.approve', ['booking' => $booking->id]) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button class="w-full py-2 rounded-lg bg-green-100 text-green-800 font-semibold">موافقة</button>
                                    </form>
                                    <form action="{{ route('bookings.reject', ['booking' => $booking->id]) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button class="w-full py-2 rounded-lg bg-red-100 text-red-800 font-semibold">رفض</button>
                                    </form>
                                @else
                                    <a href="{{ route('bookings.payment', ['booking' => $booking->id]) }}" class="py-2 px-4 rounded-lg bg-gray-100 text-gray-700">عرض التفاصيل</a>
                                @endif
                            </div>
                        </div>

                        <div style="width:140px;flex-shrink:0;text-align:center;height:140px;">
                            <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" alt="thumb" style="width:100%;height:100%;object-fit:cover;border-radius:8px;border:1px solid #eee;">
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="mt-4 text-gray-600">لا توجد طلبات جديدة حالياً</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
