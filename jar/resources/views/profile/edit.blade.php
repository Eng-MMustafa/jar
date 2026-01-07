@extends('layouts.app')

@section('title', 'تعديل البيانات - تجار')

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

    .edit-profile-container {
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

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        border: 1px solid var(--border-light);
        border-radius: 6px;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        font-size: 0.95rem;
        direction: rtl;
        text-align: right;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
    }

    .form-input:disabled {
        background: var(--bg-light);
        cursor: not-allowed;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
    }

    .btn-secondary {
        background: var(--bg-light);
        color: var(--text-dark);
        border: 1px solid var(--border-light);
    }

    .btn-secondary:hover {
        background: white;
        border-color: var(--text-light);
    }

    /* Alert Messages */
    .alert {
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        text-align: right;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    @media (max-width: 768px) {
        .edit-profile-container {
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

<div class="edit-profile-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>تعديل البيانات</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>خطأ!</strong>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="form-card">
                <h1 class="page-title">تعديل البيانات الشخصية</h1>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
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
                            <option value="القصيم" @selected(auth()->user()->city === 'القصيم')>القصيم</option>
                            <option value="الشرقية" @selected(auth()->user()->city === 'الشرقية')>الشرقية</option>
                            <option value="عسير" @selected(auth()->user()->city === 'عسير')>عسير</option>
                            <option value="تبوك" @selected(auth()->user()->city === 'تبوك')>تبوك</option>
                            <option value="حائل" @selected(auth()->user()->city === 'حائل')>حائل</option>
                            <option value="الجوف" @selected(auth()->user()->city === 'الجوف')>الجوف</option>
                            <option value="نجران" @selected(auth()->user()->city === 'نجران')>نجران</option>
                            <option value="جازان" @selected(auth()->user()->city === 'جازان')>جازان</option>
                            <option value="الباحة" @selected(auth()->user()->city === 'الباحة')>الباحة</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">الصورة الشخصية</label>
                        <div style="display:flex;gap:1rem;align-items:center;">
                            <div style="width:72px;height:72px;border-radius:50%;overflow:hidden;flex-shrink:0;">
                                <img src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('images/avatar.svg') }}" alt="avatar" style="width:100%;height:100%;object-fit:cover;" onerror="this.src='{{ asset('images/placeholder.svg') }}'">
                            </div>
                            <input type="file" name="avatar" accept="image/*">
                        </div>
                        <small class="text-gray-500">أقصى حجم للصورة 2MB. (jpg, png, gif)</small>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
