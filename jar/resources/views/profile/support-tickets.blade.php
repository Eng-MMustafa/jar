@extends('layouts.app')

@section('title', 'دعم العملاء - تجار')

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

    .support-container {
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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
        background: linear-gradient(135deg, var(--primary) 0%, #0f766e 100%);
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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

    .support-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-state {
        text-align: center;
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .empty-title {
        font-size: 1.5rem;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .empty-message {
        color: var(--text-light);
        margin-bottom: 2rem;
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 2rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 148, 136, 0.3);
    }

    .btn-secondary {
        background: var(--bg-light);
        color: var(--text-dark);
        border: 1px solid var(--border-light);
    }

    .btn-secondary:hover {
        background: white;
    }

    @media (max-width: 768px) {
        .support-container {
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

        .btn-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="support-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>دعم العملاء</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <h1 class="page-title">طلبات الإيجار الجديدة</h1>

            <div class="support-card" style="text-align:right;">
                <div class="rental-requests" style="display:flex;flex-direction:column;gap:1rem;">
                    @forelse($bookings as $booking)
                        <div class="request-card" style="background:#fff;border-radius:10px;padding:1rem;border:1px solid var(--border-light);">
                            <div style="display:grid;grid-template-columns:1fr 140px;gap:1rem;align-items:start;">
                                <div>
                                    <h3 style="margin:0;font-size:1.05rem;color:var(--text-dark);">{{ $booking->product?->name ?? 'منتج محجوز' }}</h3>
                                    <p style="color:var(--text-light);margin:0.25rem 0;">المستأجر: <strong>{{ $booking->user?->getFullNameAttribute() ?? 'مستخدم' }}</strong></p>
                                    <p style="color:var(--text-light);margin:0.25rem 0;">من: {{ $booking->start_date->format('d - m - Y') }} إلى: {{ $booking->end_date->format('d - m - Y') }}</p>
                                    <div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;margin-top:0.5rem;">
                                        <div style="font-weight:700;color:var(--text-dark);">إجمالي السعر: <span style="color:#0d9488;">{{ number_format($booking->total,2) }} ر.س</span></div>
                                        <div>
                                            @php $st = $booking->status; @endphp
                                            @if(in_array($st, ['pending','submitted']))
                                                <span class="status-badge" style="background:#fff3cd;color:#856404;border:1px solid #ffeeba;padding:0.35rem 0.6rem;border-radius:12px;">قيد الإنتظار</span>
                                            @elseif(in_array($st, ['approved','confirmed']))
                                                <span class="status-badge" style="background:#e8f8f5;color:#0d9488;border:1px solid #d1f0e8;padding:0.35rem 0.6rem;border-radius:12px;">موافقة</span>
                                            @else
                                                <span class="status-badge" style="background:#f8d7da;color:#b71c1c;border:1px solid #f5c6cb;padding:0.35rem 0.6rem;border-radius:12px;">مرفوض</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div style="display:flex;gap:0.5rem;margin-top:0.75rem;">
                                        @if($booking->status === 'pending' || $booking->status === 'submitted')
                                            <form action="{{ route('bookings.approve', ['booking' => $booking->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="background:#2ecc71;border-radius:8px;padding:0.5rem 1rem;border:none;color:white;cursor:pointer;">موافقة</button>
                                            </form>
                                            <form action="{{ route('bookings.reject', ['booking' => $booking->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من رفض هذا الطلب؟');">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" style="background:#f8d7da;border-radius:8px;padding:0.5rem 1rem;border:none;color:#b71c1c;cursor:pointer;">رفض</button>
                                            </form>
                                        @else
                                            <a href="{{ route('bookings.payment', ['booking' => $booking->id]) }}" class="btn btn-secondary">عرض التفاصيل</a>
                                        @endif
                                    </div>
                                </div>

                                <div style="width:140px;flex-shrink:0;text-align:center;height:140px;">
                                    <img src="{{ $booking->product && $booking->product->images->first() ? asset($booking->product->images->first()->image_path) : asset('images/placeholder.svg') }}" alt="thumb" style="width:100%;height:100%;object-fit:cover;border-radius:8px;border:1px solid #eee;">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-icon">📭</div>
                            <div class="empty-title">لا توجد طلبات جديدة</div>
                            <div class="empty-message">لم يصل أي طلب على منتجاتك حتى الآن.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

