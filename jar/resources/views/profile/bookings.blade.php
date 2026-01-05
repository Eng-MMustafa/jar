@extends('layouts.app')

@section('title', 'حجوزاتي - تجار')

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

    .btn {
        padding: 0.75rem 2rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
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
    }
</style>

<div class="bookings-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>حجوزاتي</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-header">
                <div class="profile-header-info">
                    <h2>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                    <p>{{ auth()->user()->email }}</p>
                    @if(auth()->user()->type === 'renter')
                        <span class="status-badge">
                            <i class="fas fa-check-circle"></i> مستأجر
                        </span>
                    @elseif(auth()->user()->type === 'lender')
                        <span class="status-badge">
                            <i class="fas fa-check-circle"></i> مؤجر
                        </span>
                    @endif
                </div>
                <div class="profile-avatar">
                    <i class="fas fa-user"></i>
                    <div class="avatar-badge">
                        <i class="fas fa-check" style="font-size: 0.6rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Links Menu -->
            <div class="quick-links">
                <a href="{{ route('profile.index') }}" title="حسابي الشخصي">
                    <i class="fas fa-user-circle"></i> حسابي الشخصي
                </a>
                <a href="{{ route('profile.edit') }}" title="إعدادات الحساب">
                    <i class="fas fa-cog"></i> إعدادات الحساب
                </a>
                <a href="{{ route('profile.bookings') }}" class="active" title="طلبات">
                    <i class="fas fa-shopping-bag"></i> طلبات
                </a>
                <a href="{{ route('notifications') }}" title="الإشعارات">
                    <i class="fas fa-bell"></i> الإشعارات
                </a>
                <a href="{{ route('chat') }}" title="المراسلات">
                    <i class="fas fa-comments"></i> المراسلات
                </a>
                <a href="{{ route('products.create') }}" title="إدارة المنتجات">
                    <i class="fas fa-box"></i> إدارة المنتجات
                </a>
                <a href="{{ route('profile.support-tickets') }}" title="طلبات إرجاع المنتجة">
                    <i class="fas fa-undo"></i> طلبات إرجاع المنتجة
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="profile-main">
            <h1 class="page-title">حجوزاتي</h1>

            <div class="bookings-card">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h2 class="empty-title">لا توجد حجوزات</h2>
                    <p class="empty-message">لم تقم بأي حجوزات حتى الآن</p>
                    <a href="{{ route('products.index') }}" class="btn">تصفح المنتجات</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
