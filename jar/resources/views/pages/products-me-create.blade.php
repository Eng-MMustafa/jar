@extends('layouts.app')

@section('title', 'إضافة منتج جديد - تجار')

@section('content')
<style>
    :root {
        --primary: #00bcd4;
        --primary-dark: #0097a7;
        --danger: #e74c3c;
        --success: #27ae60;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
        --border-light: #ddd;
    }

    .profile-container {
        font-family: 'Tajawal', sans-serif;
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

    .breadcrumb span {
        color: var(--text-light);
        margin: 0 0.5rem;
    }

    .profile-wrapper {
        display: grid;
        grid-template-columns: 1fr 2.5fr;
        gap: 2rem;
    }

    .profile-sidebar {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        height: fit-content;
    }

    .profile-main {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .profile-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        background: var(--success);
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
        color: var(--success);
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .quick-links {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid var(--border-light);
    }

    .quick-links a {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.75rem 0;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .quick-links a:hover {
        color: var(--primary-dark);
    }

    .quick-links a.logout {
        color: var(--danger);
    }

    .quick-links a.active {
        color: var(--primary);
        border-bottom: 2px solid var(--primary);
        padding-bottom: 0.75rem;
    }

    .quick-links a i {
        font-size: 1rem;
        width: 20px;
        text-align: center;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid var(--border-light);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-label .required {
        color: var(--danger);
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
        transition: border-color 0.3s ease;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .upload-area {
        border: 2px dashed var(--border-light);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-area:hover {
        border-color: var(--primary);
        background: rgba(0, 188, 212, 0.05);
    }

    .upload-area i {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .form-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        flex: 1;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
    }

    .btn-secondary {
        background: var(--bg-light);
        color: var(--text-dark);
        flex: 1;
    }

    .btn-secondary:hover {
        background: #e0e0e0;
    }

    @media (max-width: 768px) {
        .profile-container {
            padding: 1rem;
        }

        .profile-wrapper {
            grid-template-columns: 1fr;
        }

        .form-buttons {
            flex-direction: column;
        }

        .btn {
            flex: none;
        }
    }
</style>

<div class="profile-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('my-products.index') }}">إدارة المنتجات</a>
        <span>/</span>
        <span>إضافة منتج جديد</span>
    </div>

    <div class="profile-wrapper">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-header">
                <div class="profile-header-info">
                    <h2>{{ auth()->user()->full_name ?? auth()->user()->name }}</h2>
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

            <div class="quick-links">
                <a href="{{ route('profile.index') }}" title="حسابي الشخصي">
                    <i class="fas fa-user-circle"></i> حسابي الشخصي
                </a>
                <a href="{{ route('profile.edit') }}" title="إعدادات الحساب">
                    <i class="fas fa-cog"></i> إعدادات الحساب
                </a>
                <a href="{{ route('profile.bookings') }}" title="طلبات">
                    <i class="fas fa-shopping-bag"></i> طلبات
                </a>
                <a href="{{ route('notifications') }}" title="الإشعارات">
                    <i class="fas fa-bell"></i> الإشعارات
                </a>
                <a href="{{ route('chat') }}" title="المراسلات">
                    <i class="fas fa-comments"></i> المراسلات
                </a>
                <a href="{{ route('my-products.index') }}" title="إدارة المنتجات" class="active">
                    <i class="fas fa-box"></i> إدارة المنتجات
                </a>
                <a href="{{ route('profile.support-tickets') }}" title="طلبات إرجاع المنتجة">
                    <i class="fas fa-undo"></i> طلبات إرجاع المنتجة
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; font-size: 0.95rem;">
                        <a class="logout" style="cursor: pointer; padding: 0.75rem 0; display: flex; align-items: center; gap: 0.8rem;">
                            <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                        </a>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="profile-main">
            <div class="profile-card">
                <h3 class="section-title">إضافة منتج جديد</h3>

                <form action="{{ route('my-products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">اسم المنتج <span class="required">*</span></label>
                        <input type="text" name="name" class="form-input" placeholder="أدخل اسم المنتج" required>
                        @error('name')
                            <div style="color: var(--danger); font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">الوصف <span class="required">*</span></label>
                        <textarea name="description" class="form-textarea" placeholder="اكتب وصفاً مفصلاً للمنتج" required></textarea>
                        @error('description')
                            <div style="color: var(--danger); font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">الفئة <span class="required">*</span></label>
                        <select name="category_id" class="form-select" required>
                            <option value="">اختر الفئة</option>
                            <option value="1">إلكترونيات</option>
                            <option value="2">أدوات</option>
                            <option value="3">ملابس</option>
                            <option value="4">إكسسوارات</option>
                        </select>
                        @error('category_id')
                            <div style="color: var(--danger); font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">السعر (ريال) <span class="required">*</span></label>
                            <input type="number" name="price" class="form-input" placeholder="0.00" step="0.01" required>
                            @error('price')
                                <div style="color: var(--danger); font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">السعر الأصلي (اختياري)</label>
                            <input type="number" name="original_price" class="form-input" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">المدينة <span class="required">*</span></label>
                        <select name="city" class="form-select" required>
                            <option value="">اختر المدينة</option>
                            <option value="الرياض">الرياض</option>
                            <option value="جدة">جدة</option>
                            <option value="الدمام">الدمام</option>
                            <option value="المدينة">المدينة</option>
                            <option value="مكة">مكة</option>
                        </select>
                        @error('city')
                            <div style="color: var(--danger); font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">صور المنتج</label>
                        <div class="upload-area" onclick="document.getElementById('images').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p style="margin: 0.5rem 0 0 0; color: var(--text-dark);">اضغط لتحميل الصور</p>
                            <p style="margin: 0.3rem 0 0 0; font-size: 0.85rem; color: var(--text-light);">أو اسحب الصور هنا</p>
                        </div>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label class="form-label">الحالة <span class="required">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ المنتج
                        </button>
                        <a href="{{ route('my-products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
