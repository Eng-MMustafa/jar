@extends('layouts.app')

@section('title', 'تم إرسال الطلب - تجار')

@section('content')
<style>
    .success-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .success-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border-right: 4px solid #0d9488;
        text-align: center;
        max-width: 500px;
    }

    .success-icon {
        width: 120px;
        height: 120px;
        background: #27ae60;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 4rem;
        color: white;
    }

    .success-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }

    .success-message {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .success-details {
        background: #f5f7fa;
        border-right: 4px solid #0d9488;
        padding: 1.5rem;
        border-radius: 6px;
        margin-bottom: 2rem;
        text-align: right;
    }

    .success-details p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.8;
        margin: 0.5rem 0;
    }

    .success-details strong {
        color: #333;
        font-weight: 600;
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        flex-direction: column;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-primary {
        background: #0d9488;
        color: white;
    }

    .btn-primary:hover {
        background: #0f766e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 148, 136, 0.3);
    }

    .btn-secondary {
        background: white;
        color: #0d9488;
        border: 2px solid #0d9488;
    }

    .btn-secondary:hover {
        background: #f0f7fb;
    }

    @media (max-width: 768px) {
        .success-card {
            padding: 2rem 1.5rem;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            font-size: 3rem;
        }

        .success-title {
            font-size: 1.5rem;
        }

        .success-message {
            font-size: 0.9rem;
        }
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h1 class="success-title">تم إرسال طلبك بنجاح!</h1>

        <p class="success-message">
            طلبك قيد المراجعة حالياً، وسيتم التواصل معك قريباً من قبل الإدارة لتفعيل حسابك.
        </p>

        <div class="success-details">
            <p><strong>حالة الطلب:</strong> قيد المراجعة</p>
            <p><strong>الوقت المتوقع:</strong> من 2 إلى 7 أيام عمل</p>
            <p><strong>سيتم إخطارك:</strong> عبر البريد الإلكتروني والرسائل القصيرة</p>
        </div>

        <div class="btn-group">
            <a href="{{ route('home') }}" class="btn btn-primary">العودة للرئيسية</a>
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">العودة لحسابي</a>
        </div>
    </div>
</div>
@endsection
