@extends('layouts.app')

@section('title', 'طلباتى - تجار')

@section('content')
<style>
    :root {
        --primary: #00bcd4;
        --primary-dark: #0097a7;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
        --border-light: #ddd;
    }

    .bookings-container {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
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

    /* Profile Layout */
    .profile-wrapper {
        display: grid;
        grid-template-columns: 1fr 2.5fr;
        gap: 2rem;
    }

    /* Sidebar */
    .profile-sidebar {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        height: fit-content;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--border-light);
        text-align: right;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, #0097a7 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        flex-shrink: 0;
        position: relative;
    }

    .avatar-badge {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 30px;
        background: #27ae60;
        border: 3px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
    }

    .profile-header-info h2 {
        font-size: 1.3rem;
        color: var(--text-dark);
        margin-bottom: 0.3rem;
    }

    .profile-header-info p {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.4rem 0.8rem;
        background: #e8f5e9;
        color: #27ae60;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    /* Quick Links Menu */
    .quick-links {
        display: flex;
        flex-direction: column;
        gap: 0;
        margin-top: 1.5rem;
    }

    .quick-links a,
    .quick-links form {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.75rem 0;
        color: var(--text-dark);
        text-decoration: none;
        border-bottom: 1px solid var(--border-light);
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .quick-links a:hover,
    .quick-links form button:hover {
        color: var(--primary);
        padding-right: 0.5rem;
    }

    .quick-links a.active {
        color: var(--primary);
        border-bottom: 2px solid var(--primary);
        padding-bottom: 0.75rem;
    }

    .quick-links form {
        border: none;
    }

    .quick-links form button {
        background: none;
        border: none;
        padding: 0.75rem 0;
        color: var(--text-dark);
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        width: 100%;
        text-align: right;
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--border-light);
    }

    .quick-links form button:hover {
        color: #e74c3c;
    }

    .quick-links i {
        font-size: 1rem;
    }

    .profile-main {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .page-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: right;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border-light);
    }

    .bookings-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.2rem;
        border: 1px solid #eef6f6;
        box-shadow: none;
        text-align: right;
        min-height: auto;
    }

    .bookings-list {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        padding-top: 0.5rem;
    }

    .booking-item {
        flex: 1 1 calc(50% - 1rem);
        background: #fff;
        border-radius: 10px;
        border: 1px solid #f0f4f4;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        position: relative;
        /* ensure thumbnail is on the right for RTL */
        flex-direction: row-reverse;
    }

    .status-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        display: inline-block;
        padding: 0.25rem 0.6rem;
        background: #e8f8f7;
        color: #1aa59a;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .booking-thumb {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        background: #f5f7f7;
        flex-shrink: 0;
        overflow: hidden;
    }

    .booking-info {
        flex: 1;
        text-align: right;
    }

    .booking-title {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .booking-meta {
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .details-btn {
        padding: 0.6rem 1rem;
        background: #eaf7f6;
        color: var(--primary-dark);
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        font-weight: 700;
        font-size: 0.95rem;
        width: 160px;
        text-align: center;
        transition: background 0.12s ease;
    }

    .details-btn::before {
        content: '←';
        display:inline-block;
        margin-left:8px;
    }

    .details-btn:hover {
        background:#dff3f2;
    }

    @media (max-width: 600px) {
        .booking-item{ flex:1 1 100%; }
        .details-btn{ width:100%; }
    }

    /* Empty state - small card-like */
    .empty-state {
        max-width: 520px;
        margin: 0 auto;
        background: #f7fbfb;
        border-radius: 10px;
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        border: 1px solid #e6f3f3;
    }

    .empty-icon {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        background: #e9faf9;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        flex-shrink: 0;
    }

    .empty-text {
        text-align: right;
        flex: 1;
    }

    .empty-title {
        font-size: 1.1rem;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .empty-message {
        color: var(--text-light);
        margin: 0;
    }

    .btn {
        padding: 0.9rem 1.2rem;
        background: #eaf7f6;
        color: var(--primary-dark);
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.15s ease;
        box-shadow: none;
    }

    .btn::before {
        content: '←';
        display: inline-block;
        margin-left: 0.5rem;
    }

    .btn:hover {
        background: #dff3f2;
        transform: none;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    }

    @media (max-width: 768px) {
        .bookings-container {
            padding: 1rem;
        }

        .profile-wrapper {
            grid-template-columns: 1fr;
        }

        .profile-sidebar {
            order: 2;
        }

        .profile-main {
            order: 1;
        }

        .profile-header {
            flex-direction: column;
            text-align: center;
        }

        .empty-state {
            flex-direction: column;
            text-align: center;
            gap: 0.75rem;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .empty-icon {
            margin-bottom: 0;
        }
    }
</style>

<div class="bookings-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>طلباتى</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <h1 class="page-title">طلباتى</h1>

            <div class="bookings-card">
                @if($bookings->count())
                    <div class="bookings-list">
                        @foreach($bookings as $booking)
                            <div class="booking-item">
                                <span class="status-badge">{{ ucfirst($booking->status) }}</span>
                                <div class="booking-thumb">
                                    <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" alt="thumb" style="width:100%;height:100%;object-fit:cover;">
                                </div>
                                <div class="booking-info">
                                    <div class="booking-title">{{ $booking->product?->name ?? 'منتج محجوز' }}</div>
                                    <div class="booking-meta">من : {{ $booking->start_date->format('d - m - Y') }} &nbsp; إلى : {{ $booking->end_date->format('d - m - Y') }}</div>
                                    <div class="booking-meta" style="margin-top:6px;">إجمالي السعر: <strong style="color:var(--primary);">{{ number_format($booking->total, 2) }} ر.س</strong></div>
                                    <div style="margin-top:10px;display:flex;gap:8px;">
                                        @if($booking->transfer_status === 'not_sent')
                                            <a href="{{ route('bookings.payment', ['booking' => $booking->id]) }}" class="details-btn">إرسال الإيصال</a>
                                        @elseif($booking->transfer_status === 'submitted')
                                            <a href="{{ route('bookings.payment', ['booking' => $booking->id]) }}" class="details-btn">عرض الإيصال</a>
                                        @else
                                            <a href="{{ route('bookings.payment', ['booking' => $booking->id]) }}" class="details-btn">عرض التفاصيل</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state" style="margin-top:0;">
                        <div class="empty-icon">📭</div>
                        <div class="empty-text">
                            <h3 class="empty-title">لا توجد حجوزات حتى الآن</h3>
                            <p class="empty-message">لم تقم بإنشاء أية حجوزات حتى الآن. عند إتمام أي حجز سيظهر هنا ملخص الحجز وحالة الدفع.</p>
                            <div style="margin-top:0.75rem;">
                                <a href="{{ route('products.index') }}" class="btn">تصفح المنتجات</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
