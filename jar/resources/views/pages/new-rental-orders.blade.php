@extends('layouts.app')

@section('title', 'طلبات الإيجار الواردة')

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

    .bookings-container {
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        direction: rtl;
        max-width: 1200px;
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
        grid-template-columns: 1fr 3fr;
        gap: 2rem;
    }

    /* Sidebar - reusing the partial, but ensuring styles are present if not loaded globally */
    /* (Styles for sidebar are likely in the partial or global css, but we keep the grid layout here) */

    .profile-main {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .page-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid var(--border-light);
        padding-bottom: 1rem;
        margin-bottom: 1rem;
    }

    .page-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    .filters {
        display: flex;
        gap: 0.5rem;
    }

    .filter-btn {
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.85rem;
        text-decoration: none;
        color: var(--text-light);
        background: #f0f0f0;
        transition: all 0.2s;
    }

    .filter-btn:hover, .filter-btn.active {
        background: var(--primary);
        color: white;
    }

    .bookings-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.2rem;
        border: 1px solid #eef6f6;
        text-align: right;
    }

    .bookings-list {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .booking-item {
        flex: 1 1 100%; /* Full width for rental orders to show more details */
        background: #fff;
        border-radius: 10px;
        border: 1px solid #f0f4f4;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        position: relative;
        flex-direction: row-reverse; /* Thumbnail on right */
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

    .status-badge.pending { background: #fff8e1; color: #f57f17; }
    .status-badge.approved { background: #e8f5e9; color: #2e7d32; }
    .status-badge.rejected { background: #ffebee; color: #c62828; }

    .booking-thumb {
        width: 80px;
        height: 80px;
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
        font-size: 1.1rem;
    }

    .booking-meta {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-bottom: 0.25rem;
    }

    .tenant-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        padding-top: 0.5rem;
        border-top: 1px dashed #eee;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .tenant-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        object-fit: cover;
    }

    .actions-row {
        margin-top: 10px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .details-btn {
        padding: 0.5rem 1rem;
        background: #eaf7f6;
        color: var(--primary-dark);
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
        transition: background 0.12s ease;
    }

    .details-btn:hover {
        background: #dff3f2;
    }

    .details-btn.approve {
        background: #e8f5e9;
        color: #2e7d32;
    }
    .details-btn.approve:hover {
        background: #c8e6c9;
    }

    .details-btn.reject {
        background: #ffebee;
        color: #c62828;
    }
    .details-btn.reject:hover {
        background: #ffcdd2;
    }

    .details-btn.receipt {
        background: #e3f2fd;
        color: #1565c0;
    }
    .details-btn.receipt:hover {
        background: #bbdefb;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--text-light);
    }
    .empty-icon { font-size: 3rem; margin-bottom: 1rem; display:block; }

    @media (max-width: 768px) {
        .profile-wrapper { grid-template-columns: 1fr; }
        .booking-item { flex-direction: column; text-align: center; }
        .booking-info { text-align: center; }
        .status-badge { position: static; margin-bottom: 0.5rem; }
        .actions-row { justify-content: center; }
    }
</style>

<div class="bookings-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>طلبات الإيجار الواردة</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <div class="page-header-flex">
                <h1 class="page-title">طلبات الإيجار الواردة</h1>
                <div class="filters">
                    <a href="{{ route('new-rental-orders', ['status' => 'all']) }}" class="filter-btn {{ request('status', 'all') == 'all' ? 'active' : '' }}">الكل</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'pending']) }}" class="filter-btn {{ request('status') == 'pending' ? 'active' : '' }}">قيد الانتظار</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'approved']) }}" class="filter-btn {{ request('status') == 'approved' ? 'active' : '' }}">موافق عليها</a>
                    <a href="{{ route('new-rental-orders', ['status' => 'rejected']) }}" class="filter-btn {{ request('status') == 'rejected' ? 'active' : '' }}">مرفوضة</a>
                </div>
            </div>

            <div class="bookings-card">
                @if($bookings->count())
                    <div class="bookings-list">
                        @foreach($bookings as $booking)
                            <div class="booking-item">
                                @php
                                    $statusClass = 'pending';
                                    $statusLabel = 'قيد الانتظار';
                                    if($booking->status == 'approved') { $statusClass = 'approved'; $statusLabel = 'موافق عليه'; }
                                    if($booking->status == 'rejected') { $statusClass = 'rejected'; $statusLabel = 'مرفوض'; }
                                    if($booking->status == 'awaiting_payment') { $statusClass = 'pending'; $statusLabel = 'بانتظار الدفع'; }
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                
                                <div class="booking-thumb">
                                    <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" alt="thumb" style="width:100%;height:100%;object-fit:cover;">
                                </div>
                                
                                <div class="booking-info">
                                    <div class="booking-title">{{ $booking->product?->name ?? 'منتج محذوف' }}</div>
                                    <div class="booking-meta">
                                        من : {{ \Carbon\Carbon::parse($booking->start_date)->format('d - m - Y') }} 
                                        &nbsp; إلى : {{ \Carbon\Carbon::parse($booking->end_date)->format('d - m - Y') }}
                                    </div>
                                    <div class="booking-meta" style="margin-top:6px;">
                                        إجمالي السعر: <strong style="color:var(--primary);">{{ number_format($booking->total, 2) }} ر.س</strong>
                                    </div>
                                    
                                    <div class="tenant-info">
                                        @if($booking->user)
                                            <img src="{{ $booking->user->avatar ? asset($booking->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($booking->user->first_name) }}" class="tenant-avatar" alt="User">
                                            <span>المستأجر: {{ $booking->user->first_name }} {{ $booking->user->last_name }}</span>
                                        @else
                                            <img src="{{ asset('images/avatar.svg') }}" class="tenant-avatar" alt="User">
                                            <span>المستأجر: مستخدم محذوف</span>
                                        @endif
                                    </div>

                                    <div class="actions-row">
                                        {{-- Show Receipt if submitted --}}
                                        @if($booking->transfer_proof_path)
                                            <a href="{{ asset('storage/' . $booking->transfer_proof_path) }}" target="_blank" class="details-btn receipt">
                                                📄 عرض الإيصال
                                            </a>
                                        @endif

                                        {{-- Approve/Reject Buttons --}}
                                        @if($booking->status == 'pending' || ($booking->status == 'pending' && $booking->transfer_status == 'submitted'))
                                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" id="approve-form-{{ $booking->id }}">
                                                @csrf
                                                <button type="submit" class="details-btn approve" onclick="console.log('Approve clicked for {{ $booking->id }}');">✓ موافقة</button>
                                            </form>
                                            <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" id="reject-form-{{ $booking->id }}">
                                                @csrf
                                                <button type="submit" class="details-btn reject" onclick="console.log('Reject clicked for {{ $booking->id }}');">✕ رفض</button>
                                            </form>
                                        @endif

                                        {{-- Status specific message if needed --}}
                                        @if($booking->status == 'approved')
                                            <span style="color:#2e7d32;font-weight:bold;font-size:0.9rem;">تمت الموافقة</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <span class="empty-icon">📭</span>
                        <h3>لا توجد طلبات إيجار حالياً</h3>
                        <p>عندما يقوم شخص ما بحجز أحد منتجاتك، سيظهر الطلب هنا.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
