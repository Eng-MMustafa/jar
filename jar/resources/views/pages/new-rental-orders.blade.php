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
            <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4 pb-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">{{ $booking->product?->name ?? 'منتج محجوز' }}</h3>
                            <p class="text-sm text-gray-600 mt-1">رقم الطلب: <span class="font-medium">#{{ $booking->id }}</span></p>
                            <p class="text-sm text-gray-600 mt-1">الكمية: <span class="font-medium">{{ $booking->quantity }}</span></p>
                        </div>
                        @php
                            $status = $booking->status;
                        @endphp
                        @if($status === 'approved' || $status === 'confirmed')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">موافق عليه</span>
                        @elseif($status === 'submitted' || $status === 'pending')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">قيد الانتظار</span>
                        @else
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">مرفوض</span>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">التواريخ</p>
                            <p class="text-sm font-medium text-gray-900">من {{ $booking->start_date->format('d - m - Y') }}</p>
                            <p class="text-sm font-medium text-gray-900">إلى {{ $booking->end_date->format('d - m - Y') }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">المستأجر</p>
                            <div class="flex items-center gap-2">
                                <img src="{{ $booking->user?->avatar ?? asset('images/avatar.svg') }}" alt="User" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $booking->user?->getFullNameAttribute() ?? 'مستخدم' }}</p>
                                    <p class="text-xs text-gray-500">{{ $booking->user?->email ?? '' }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">السعر</p>
                            <p class="text-lg font-bold text-teal-600">{{ number_format($booking->total, 2) }} ر.س</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">تاريخ الطلب</p>
                            <p class="text-sm font-medium text-gray-900">{{ $booking->created_at->format('d F Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $booking->created_at->format('g:i A') }}</p>
                        </div>
                    </div>

                    @if($booking->notes)
                        <div class="bg-gray-50 border border-gray-100 rounded-lg p-3 mb-4">
                            <p class="text-sm text-gray-700">{{ $booking->notes }}</p>
                        </div>
                    @endif

                    @if($booking->status === 'pending' || $booking->status === 'submitted')
                    <div class="flex gap-3 pt-4 border-t border-gray-200">
                        <form action="{{ route('bookings.approve', ['booking' => $booking->id]) }}" method="POST" class="flex-1">
                            @csrf
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">✓ موافقة</button>
                        </form>
                        <form action="{{ route('bookings.reject', ['booking' => $booking->id]) }}" method="POST" class="flex-1">
                            @csrf
                            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-medium transition-colors">✕ رفض</button>
                        </form>
                    </div>
                    @endif
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

        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="mt-4 text-gray-600">لا توجد طلبات جديدة حالياً</p>
        </div>
    </div>
</div>
@endsection
