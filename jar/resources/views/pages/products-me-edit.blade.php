@extends('layouts.app')

@section('title', 'تعديل المنتج - تجار')

@section('content')
<style>
    :root {
        --primary: #0d9488;
        --primary-dark: #0f766e;
        --danger: #e74c3c;
        --success: #00ce67;
        --text-dark: #333;
        --text-light: #666;
        --bg-light: #f5f7fa;
        --border-light: #ddd;
    }

    .profile-container {
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

    /* Unified sidebar quick-links (match profile layout) */
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        font-size: 0.95rem;
        transition: border-color 0.3s ease;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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

    .btn-danger {
        background: var(--danger);
        color: white;
    }

    .btn-danger:hover {
        background: #c0392b;
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
        <span>تعديل المنتج</span>
    </div>

    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <div class="profile-card">
                <h3 class="section-title">تعديل المنتج</h3>

                <form action="{{ route('my-products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">اسم المنتج <span class="required">*</span></label>
                        <input type="text" name="name" class="form-input" placeholder="أدخل اسم المنتج" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">الوصف <span class="required">*</span></label>
                        <textarea name="description" class="form-textarea" placeholder="اكتب وصفاً مفصلاً للمنتج" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">الفئة <span class="required">*</span></label>
                        <select name="category_id" class="form-select" required>
                            <option value="">اختر الفئة</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">السعر (ريال) <span class="required">*</span></label>
                            <input type="number" name="price" class="form-input" placeholder="0.00" step="0.01" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">مبلغ التأمين (اختياري)</label>
                            <input type="number" name="security_deposit" class="form-input" placeholder="0.00" step="0.01" value="{{ old('security_deposit', $product->security_deposit ?? '') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">نوع الإيجار</label>
                        <div style="display:flex;gap:1rem;align-items:center;">
                            <label style="display:flex;gap:0.4rem;align-items:center;">
                                <input type="radio" name="rental_type" value="daily" {{ old('rental_type', $product->rental_type) == 'daily' ? 'checked' : '' }}> يومي
                            </label>
                            <label style="display:flex;gap:0.4rem;align-items:center;">
                                <input type="radio" name="rental_type" value="hourly" {{ old('rental_type', $product->rental_type) == 'hourly' ? 'checked' : '' }}> بالساعة
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">الصورة الرئيسية للمنتج</label>
                        @if($product->primaryImage)
                            <div style="margin-bottom:0.5rem;">
                                <img src="{{ asset($product->primaryImage->image_path) }}" alt="الصورة الرئيسية" style="max-width:120px;border-radius:8px;">
                            </div>
                        @endif
                        <div class="upload-area" onclick="document.getElementById('main_image').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p style="margin: 0.5rem 0 0 0; color: var(--text-dark);">اضغط لتغيير الصورة الرئيسية</p>
                        </div>
                        <input type="file" id="main_image" name="main_image" accept="image/*" style="display: none;">
                        <div id="main_image_preview" style="margin-top: 10px;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">المدينة <span class="required">*</span></label>
                        <select name="city" class="form-select" required>
                            <option value="">اختر المدينة</option>
                            <option value="الرياض" @selected(old('city', $product->city) == 'الرياض')>الرياض</option>
                            <option value="جدة" @selected(old('city', $product->city) == 'جدة')>جدة</option>
                            <option value="الدمام" @selected(old('city', $product->city) == 'الدمام')>الدمام</option>
                            <option value="المدينة" @selected(old('city', $product->city) == 'المدينة')>المدينة</option>
                            <option value="مكة" @selected(old('city', $product->city) == 'مكة')>مكة</option>
                            <option value="القصيم" @selected(old('city', $product->city) == 'القصيم')>القصيم</option>
                            <option value="بريدة" @selected(old('city', $product->city) == 'بريدة')>بريدة</option>
                            <option value="عنيزة" @selected(old('city', $product->city) == 'عنيزة')>عنيزة</option>
                            <option value="الرس" @selected(old('city', $product->city) == 'الرس')>الرس</option>
                            <option value="المذنب" @selected(old('city', $product->city) == 'المذنب')>المذنب</option>
                            <option value="البكيرية" @selected(old('city', $product->city) == 'البكيرية')>البكيرية</option>
                            <option value="البدائع" @selected(old('city', $product->city) == 'البدائع')>البدائع</option>
                            <option value="الأسياح" @selected(old('city', $product->city) == 'الأسياح')>الأسياح</option>
                            <option value="عيون الجواء" @selected(old('city', $product->city) == 'عيون الجواء')>عيون الجواء</option>
                            <option value="رياض الخبراء" @selected(old('city', $product->city) == 'رياض الخبراء')>رياض الخبراء</option>
                            <option value="الشماسية" @selected(old('city', $product->city) == 'الشماسية')>الشماسية</option>
                            <option value="النبهانية" @selected(old('city', $product->city) == 'النبهانية')>النبهانية</option>
                            <option value="ضرية" @selected(old('city', $product->city) == 'ضرية')>ضرية</option>
                            <option value="عقلة الصقور" @selected(old('city', $product->city) == 'عقلة الصقور')>عقلة الصقور</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">الحالة <span class="required">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ $product->is_active ? 'selected' : '' }}>نشط</option>
                            <option value="inactive" {{ !$product->is_active ? 'selected' : '' }}>غير نشط</option>
                        </select>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ التعديلات
                        </button>
                        <a href="{{ route('my-products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>

                <div style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid var(--border-light);">
                    <form action="{{ route('my-products.delete', $product->id) }}" method="POST" onsubmit="return confirm('هل تريد حذف هذا المنتج؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> حذف المنتج
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Constants
    const MAX_SIZE = 20 * 1024 * 1024; // 20MB
    const MIN_SIZE = 5 * 1024; // 5KB

    function showError(message) {
        alert(message);
    }

    // Main Image Handler
    const mainImageInput = document.getElementById('main_image');
    if (mainImageInput) {
        mainImageInput.addEventListener('change', function(e) {
            handleFileSelect(e.target, 'main_image_preview', false);
        });
    }

    function handleFileSelect(input, previewId, isMultiple) {
        const previewContainer = document.getElementById(previewId);
        if (!previewContainer) return;

        previewContainer.innerHTML = ''; // Clear

        const files = Array.from(input.files);

        files.forEach(file => {
            // Validation
            if (!file.type.startsWith('image/')) {
                showError(`عذراً، الملف "${file.name}" ليس صورة. يرجى رفع ملفات صور فقط.`);
                input.value = ''; // Reset
                previewContainer.innerHTML = '';
                return;
            }

            if (file.size > MAX_SIZE) {
                showError(`عذراً، الملف "${file.name}" حجمه كبير جداً (أكثر من 20 ميجابايت).`);
                input.value = '';
                previewContainer.innerHTML = '';
                return;
            }

            if (file.size < MIN_SIZE) {
                showError(`عذراً، الملف "${file.name}" صغير جداً.`);
                input.value = '';
                previewContainer.innerHTML = '';
                return;
            }

            // Preview
            const objectUrl = URL.createObjectURL(file);
            const div = document.createElement('div');
            div.style.position = 'relative';

            div.innerHTML = `
                <img src="${objectUrl}" style="max-width: 100%; max-height: 300px; border-radius: 8px; border: 1px solid #ddd;">
                <div style="margin-top: 5px; color: #666;">${file.name}</div>
            `;

            previewContainer.appendChild(div);
        });
    }

    // Form Validation (Main Form)
    const updateForm = document.querySelector('form[action*="update"]');
    if (updateForm) {
        updateForm.addEventListener('submit', function(e) {
            const requiredInputs = this.querySelectorAll('[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = 'var(--danger)';
                } else {
                    input.style.borderColor = 'var(--border-light)';
                }
            });

            if (!isValid) {
                e.preventDefault();
                showError('يرجى تعبئة جميع الحقول المطلوبة.');
            }
        });
    }
</script>

@endsection
