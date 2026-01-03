@extends('layouts.app')

@section('title', 'تعديل البيانات - تجار')

@section('content')
<style>
    :root {
        --primary: #00bcd4;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
    }

    .edit-profile-container {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        max-width: 700px;
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

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1.5rem;
    }

    .form-label {
        text-align: right;
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-input {
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
        direction: rtl;
        text-align: right;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        justify-content: flex-start;
        margin-top: 2rem;
    }

    .btn {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 6px;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: #0097a7;
        transform: translateY(-2px);
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

<div class="edit-profile-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>تعديل البيانات</span>
    </div>

    <h1 class="page-title">تعديل البيانات الشخصية</h1>

    <div class="form-card">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">الاسم الأول</label>
                <input type="text" name="first_name" class="form-input" value="{{ auth()->user()->first_name }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">الاسم الأخير</label>
                <input type="text" name="last_name" class="form-input" value="{{ auth()->user()->last_name }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-input" value="{{ auth()->user()->email }}" disabled>
                <small style="color: var(--text-light); margin-top: 0.3rem;">لا يمكن تغيير البريد الإلكتروني</small>
            </div>

            <div class="form-group">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" name="phone" class="form-input" value="{{ auth()->user()->phone }}" placeholder="05xxxxxxxxx" required>
            </div>

            <div class="form-group">
                <label class="form-label">المدينة</label>
                <select name="city" class="form-input" required>
                    <option value="">اختر المدينة</option>
                    <option value="الرياض" @selected(auth()->user()->city === 'الرياض')>الرياض</option>
                    <option value="جدة" @selected(auth()->user()->city === 'جدة')>جدة</option>
                    <option value="الدمام" @selected(auth()->user()->city === 'الدمام')>الدمام</option>
                    <option value="مكة" @selected(auth()->user()->city === 'مكة')>مكة</option>
                    <option value="المدينة" @selected(auth()->user()->city === 'المدينة')>المدينة</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
