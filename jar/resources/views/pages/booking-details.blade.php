@extends('layouts.app')

@section('title', 'تفاصيل الحجز')

@section('content')
<style>
    :root {
        --primary: #0d9488;
        --primary-dark: #0f766e;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
        --border-light: #ddd;
    }

    .booking-details-container {
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        direction: rtl;
        max-width: 900px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .breadcrumb {
        background: #f0f7fb;
        padding: 1rem;
        text-align: right;
        margin-bottom: 2rem;
        border-radius: 8px;
    }

    .breadcrumb a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
    }

    .details-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        border: 1px solid #eef6f6;
    }

    .card-header {
        background: #f8fafc;
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 0.875rem;
    }
    .status-badge.approved { background: #dcfce7; color: #166534; }
    .status-badge.pending { background: #fef9c3; color: #854d0e; }
    .status-badge.rejected { background: #fee2e2; color: #991b1b; }

    .card-body {
        padding: 2rem;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f0f4f4;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-item label {
        display: block;
        font-size: 0.875rem;
        color: var(--text-light);
        margin-bottom: 0.25rem;
    }

    .info-item div {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1rem;
    }

    .product-preview {
        display: flex;
        gap: 1.5rem;
        background: #f8fafc;
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 2rem;
        align-items: center;
    }

    .product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        background: #fff;
    }

    .product-info h3 {
        margin: 0 0 0.5rem 0;
        font-size: 1.2rem;
    }

    .user-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #fff;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
    }

    .action-btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: var(--primary);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background 0.2s;
        text-align: center;
    }
    .action-btn:hover {
        background: var(--primary-dark);
    }
</style>

<div class="booking-details-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        @if($isOwner)
            <a href="{{ route('new-rental-orders') }}">طلبات الإيجار</a>
        @else
            <a href="{{ route('profile.bookings') }}">حجوزاتي</a>
        @endif
        <span>/</span>
        <span>تفاصيل الحجز #{{ $booking->id }}</span>
    </div>

    <div class="details-card">
        <div class="card-header">
            <h1 class="card-title">تفاصيل الحجز #{{ $booking->id }}</h1>
            @php
                $statusClass = 'pending';
                $statusLabel = 'قيد الانتظار';
                if($booking->status == 'approved') { $statusClass = 'approved'; $statusLabel = 'موافق عليه'; }
                if($booking->status == 'rejected') { $statusClass = 'rejected'; $statusLabel = 'مرفوض'; }
            @endphp
            <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
        </div>

        <div class="card-body">
            
            <h3 class="section-title">تفاصيل المنتج</h3>
            <div class="product-preview">
                <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" class="product-img" alt="Product">
                <div class="product-info">
                    <h3>{{ $booking->product->name ?? 'منتج غير متوفر' }}</h3>
                    <div style="color: var(--primary); font-weight: 700;">
                        {{ number_format($booking->price_per_night, 2) }} ر.س / ليلة
                    </div>
                </div>
            </div>

            <h3 class="section-title">معلومات الحجز</h3>
            <div class="info-grid">
                <div class="info-item">
                    <label>تاريخ البدء</label>
                    <div>{{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d') }}</div>
                </div>
                <div class="info-item">
                    <label>تاريخ الانتهاء</label>
                    <div>{{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d') }}</div>
                </div>
                <div class="info-item">
                    <label>عدد الليالي</label>
                    <div>{{ $booking->nights }}</div>
                </div>
                <div class="info-item">
                    <label>الإجمالي</label>
                    <div style="color: var(--primary); font-size: 1.2rem;">{{ number_format($booking->total, 2) }} ر.س</div>
                </div>
            </div>

            @if($isOwner)
                <h3 class="section-title">معلومات المستأجر</h3>
                <div class="user-card">
                    @if($booking->user)
                        <img src="{{ $booking->user->avatar ? asset($booking->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($booking->user->first_name) }}" class="user-avatar" alt="User">
                        <div style="flex: 1;">
                            <div style="font-weight: 700;">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</div>
                            <div style="color: var(--text-light); font-size: 0.9rem;">{{ $booking->user->email }}</div>
                            <div style="color: var(--text-light); font-size: 0.9rem;">{{ $booking->user->phone ?? 'لا يوجد رقم هاتف' }}</div>
                            
                            @if($booking->user->phone)
                                <div style="margin-top: 0.5rem; display: flex; gap: 0.5rem;">
                                    <a href="tel:{{ $booking->user->phone }}" class="action-btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: #25D366;">
                                        📞 اتصال
                                    </a>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->user->phone) }}" target="_blank" class="action-btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: #25D366;">
                                        💬 واتساب
                                    </a>
                                </div>
                            @endif
                        </div>
                    @else
                        <div>مستخدم محذوف</div>
                    @endif
                </div>
            @endif

            @if($isRenter && $booking->product && $booking->product->user)
                <h3 class="section-title">معلومات المؤجر</h3>
                <div class="user-card">
                    <img src="{{ $booking->product->user->avatar ? asset($booking->product->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($booking->product->user->first_name) }}" class="user-avatar" alt="Owner">
                    <div style="flex: 1;">
                        <div style="font-weight: 700;">{{ $booking->product->user->first_name }} {{ $booking->product->user->last_name }}</div>
                        <div style="color: var(--text-light); font-size: 0.9rem;">مالك المنتج</div>
                        
                        @if($booking->product->user->phone)
                            <div style="color: var(--text-dark); margin-top: 0.25rem;">
                                {{ $booking->product->user->phone }}
                            </div>
                            <div style="margin-top: 0.5rem; display: flex; gap: 0.5rem;">
                                <a href="tel:{{ $booking->product->user->phone }}" class="action-btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: #25D366;">
                                    📞 اتصال
                                </a>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->product->user->phone) }}" target="_blank" class="action-btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: #25D366;">
                                    💬 واتساب
                                </a>
                            </div>
                        @else
                            <div style="color: var(--text-light); font-size: 0.9rem;">لا يوجد رقم هاتف للتواصل</div>
                        @endif
                    </div>
                </div>
            @endif

            @if($booking->transfer_proof_path)
                <div style="margin-top: 2rem;">
                    <h3 class="section-title">إيصال الدفع</h3>
                    <a href="{{ asset('storage/' . $booking->transfer_proof_path) }}" target="_blank" class="action-btn" style="background-color: #64748b;">
                        📄 عرض الإيصال المرفق
                    </a>
                </div>
            @endif

            <div style="margin-top: 2rem; text-align: center;">
                <a href="{{ $isOwner ? route('new-rental-orders') : route('profile.bookings') }}" class="action-btn">عودة للقائمة</a>
            </div>

        </div>
    </div>
</div>
@endsection
