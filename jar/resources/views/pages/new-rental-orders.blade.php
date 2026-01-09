@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900">طلبات الإيجار الجديدة</h1>

                <!-- Filter Bar -->
                <div class="flex gap-2">
                    <a href="{{ route('new-rental-orders', ['status' => 'all']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status', 'all') == 'all' ? 'bg-teal-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">جميع الطلبات</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'pending']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'pending' ? 'bg-teal-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">قيد الانتظار</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'approved']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'approved' ? 'bg-teal-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">موافق عليها</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'rejected']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'rejected' ? 'bg-teal-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">مرفوضة</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders List -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-4">
            @forelse ($bookings as $booking)
            <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow p-6">
                <!-- Top Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <!-- Order Number -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">رقم الطلب</p>
                        <p class="font-semibold text-gray-900">#{{ $booking->id }}</p>
                    </div>

                    <!-- Date -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">تاريخ الطلب</p>
                        <p class="font-medium text-gray-900">{{ $booking->created_at->format('d M Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->created_at->format('h:i A') }}</p>
                    </div>

                    <!-- Total Amount -->
                    <div>
                        <p class="text-xs text-gray-500 mb-1">الإجمالي</p>
                        <p class="font-semibold text-teal-600 text-lg">ر.س {{ number_format($booking->total, 2) }}</p>
                    </div>

                    <!-- Status -->
                    <div class="flex justify-end">
                        @if($booking->status == 'approved')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">موافق عليه</span>
                        @elseif($booking->status == 'pending')
                            @if($booking->transfer_status == 'submitted')
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">إيصال مرسل</span>
                            @else
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">قيد الانتظار</span>
                            @endif
                        @elseif($booking->status == 'rejected')
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">مرفوض</span>
                        @elseif($booking->status == 'awaiting_payment')
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">بانتظار الدفع</span>
                        @endif
                    </div>
                </div>

                <!-- Info Section (Product + Tenant) -->
                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Product Info -->
                        <div class="flex gap-4 items-start flex-1">
                            <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" alt="Product" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900">{{ $booking->product->name ?? 'منتج محذوف' }}</h3>
                                <p class="text-sm text-gray-600 mt-1">من {{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d') }} إلى {{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d') }}</p>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-sm text-gray-700">الكمية: <span class="font-medium">{{ $booking->quantity }}</span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Tenant Info -->
                        <div class="flex gap-4 items-start flex-1 border-t md:border-t-0 md:border-r border-gray-200 pt-4 md:pt-0 md:pr-4">
                            <img src="{{ $booking->user->avatar ? asset('storage/' . $booking->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($booking->user->first_name) }}" alt="User" class="w-12 h-12 rounded-full flex-shrink-0">
                            <div>
                                <h3 class="font-semibold text-gray-900">المستأجر: {{ $booking->user->first_name }} {{ $booking->user->last_name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    @if($booking->user->created_at->diffInMonths(now()) < 1)
                                    مستخدم جديد
                                    @else
                                    عضو منذ {{ $booking->user->created_at->format('Y') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transfer Proof (if exists) -->
                @if($booking->transfer_proof_path)
                <div class="bg-blue-50 border border-blue-100 p-3 rounded-lg mb-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm text-blue-800 font-medium">تم إرفاق إيصال التحويل</span>
                    </div>
                    <a href="{{ asset('storage/' . $booking->transfer_proof_path) }}" target="_blank" class="text-sm bg-white border border-blue-200 px-3 py-1 rounded shadow-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">عرض الإيصال</a>
                </div>
                @endif

                <!-- Action Buttons -->
                @if($booking->status == 'pending' || $booking->status == 'awaiting_payment')
                <div class="flex gap-3 pt-4 border-t border-gray-200">
                    <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            ✓ موافقة
                        </button>
                    </form>

                    <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-medium transition-colors">
                            ✕ رفض
                        </button>
                    </form>
                </div>
                @else
                <div class="pt-4 border-t border-gray-200 text-center">
                    <span class="text-gray-500 text-sm">تم اتخاذ إجراء بشأن هذا الطلب</span>
                </div>
                @endif
            </div>
            @empty
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">لا توجد طلبات</h3>
                <p class="mt-1 text-gray-500">لا توجد طلبات إيجار مطابقة للفلتر المحدد حالياً.</p>
                @if(request('status') && request('status') != 'all')
                <div class="mt-6">
                    <a href="{{ route('new-rental-orders', ['status' => 'all']) }}" class="text-teal-600 hover:text-teal-700 font-medium">عرض جميع الطلبات</a>
                </div>
                @endif
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
