@extends('layouts.app')

@section('title', 'دعم العملاء - تجار')

@section('content')
<style>
    :root {
        --primary: #00bcd4;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
    }

    .support-container {
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

    .page-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: right;
        margin-bottom: 2rem;
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
        font-family: 'Tajawal', sans-serif;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: #0097a7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
    }

    .btn-secondary {
        background: var(--bg-light);
        color: var(--text-dark);
        border: 1px solid #ddd;
    }

    .btn-secondary:hover {
        background: white;
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

    <h1 class="page-title">دعم العملاء</h1>

    <div class="support-card">
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h2 class="empty-title">لا توجد تذاكر دعم</h2>
            <p class="empty-message">لم تقم بفتح أي تذكرة دعم حتى الآن</p>
            <div class="btn-group">
                <button class="btn" onclick="alert('سيتم قريباً')">فتح تذكرة جديدة</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">العودة</a>
            </div>
        </div>
    </div>
</div>
@endsection
