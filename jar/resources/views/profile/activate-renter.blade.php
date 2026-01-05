@extends('layouts.app')

@section('title', 'تفعيل حساب المؤجر - تجار')

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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .activate-renter-container {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
    }

    /* Breadcrumb */
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

    /* Main Container */
    .main-content {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .page-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: right;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: var(--text-light);
        text-align: right;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: right;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border-light);
    }

    /* Form Grid */
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        text-align: right;
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-label.required::after {
        content: ' *';
        color: var(--danger);
    }

    .form-input,
    .form-select,
    .form-textarea {
        padding: 0.75rem;
        border: 1px solid var(--border-light);
        border-radius: 6px;
        font-family: 'Tajawal', sans-serif;
        font-size: 0.95rem;
        direction: rtl;
        text-align: right;
        transition: all 0.3s ease;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Upload Section */
    .upload-section {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .upload-field {
        border: 2px dashed var(--primary);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        background: rgba(0, 188, 212, 0.05);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-field:hover {
        border-color: var(--primary-dark);
        background: rgba(0, 188, 212, 0.1);
    }

    .upload-icon {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .upload-text {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .upload-hint {
        color: var(--text-light);
        font-size: 0.85rem;
    }

    .upload-input {
        display: none;
    }

    /* Uploaded Files */
    .uploaded-files {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1rem;
    }

    .file-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        background: var(--bg-light);
        border-radius: 6px;
        font-size: 0.9rem;
    }

    .file-remove {
        color: var(--danger);
        cursor: pointer;
        font-weight: 600;
    }

    /* Bank Section Note */
    .bank-note {
        background: #e8f4f8;
        border-right: 4px solid var(--primary);
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        color: var(--text-dark);
        text-align: right;
    }

    .bank-note a {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    /* Buttons */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-start;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border-light);
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

    /* Success/Error Messages */
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

    /* Profile Icon Section */
    .profile-section {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
        text-align: right;
        padding: 1.5rem;
        background: var(--bg-light);
        border-radius: 8px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, #0097a7 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .profile-info h3 {
        color: var(--text-dark);
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }

    .profile-info p {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .activate-renter-container {
            padding: 1rem;
        }

        .main-content {
            padding: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }

        .profile-section {
            flex-direction: column;
            text-align: center;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
        }
    }
</style>

<div class="activate-renter-container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <a href="{{ route('profile.index') }}">حسابي</a>
        <span>/</span>
        <span>تفعيل حساب المؤجر</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <div class="main-content">
        <!-- Profile Section -->
        <div class="profile-section">
            <div class="profile-info">
                <h3>{{ auth()->user()->full_name }}</h3>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <!-- Display Messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="page-title">تفعيل حساب المؤجر</h1>
        <p class="page-subtitle">أكمل البيانات التالية لتصبح مؤجراً معتمداً</p>

        <form action="{{ route('profile.activate-renter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Personal Information Section -->
            <div class="form-section">
                <h2 class="section-title">البيانات الشخصية</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">اسم الشهرة / اسم المؤجر</label>
                        <input type="text" name="business_name" class="form-input @error('business_name') is-invalid @enderror" 
                               value="{{ old('business_name', auth()->user()->business_name ?? '') }}" required>
                        @error('business_name')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">المدينة / المحافظة</label>
                        <select name="city" class="form-select @error('city') is-invalid @enderror" required>
                            <option value="">اختر المدينة</option>
                            <option value="الرياض" @selected(old('city') == 'الرياض')>الرياض</option>
                            <option value="جدة" @selected(old('city') == 'جدة')>جدة</option>
                            <option value="الدمام" @selected(old('city') == 'الدمام')>الدمام</option>
                            <option value="مكة" @selected(old('city') == 'مكة')>مكة</option>
                            <option value="المدينة" @selected(old('city') == 'المدينة')>المدينة</option>
                            <option value="القصيم" @selected(old('city') == 'القصيم')>القصيم</option>
                            <option value="الشرقية" @selected(old('city') == 'الشرقية')>الشرقية</option>
                            <option value="عسير" @selected(old('city') == 'عسير')>عسير</option>
                            <option value="تبوك" @selected(old('city') == 'تبوك')>تبوك</option>
                            <option value="حائل" @selected(old('city') == 'حائل')>حائل</option>
                            <option value="الجوف" @selected(old('city') == 'الجوف')>الجوف</option>
                            <option value="نجران" @selected(old('city') == 'نجران')>نجران</option>
                            <option value="جازان" @selected(old('city') == 'جازان')>جازان</option>
                            <option value="الباحة" @selected(old('city') == 'الباحة')>الباحة</option>
                        </select>
                        @error('city')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">وصف محل التأجير</label>
                        <textarea name="business_description" class="form-textarea @error('business_description') is-invalid @enderror" 
                                  placeholder="اكتب وصفاً عن محل التأجير الخاص بك...">{{ old('business_description') }}</textarea>
                        @error('business_description')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">صورة الأيدي</label>
                        <div class="upload-field" onclick="document.getElementById('hand-photo').click()">
                            <div class="upload-icon">📸</div>
                            <div class="upload-text">اختر الصورة</div>
                            <div class="upload-hint">اضغط أو اسحب صورة هنا (JPG, PNG)</div>
                        </div>
                        <input type="file" id="hand-photo" name="hand_photo" class="upload-input" accept="image/*">
                        <div class="uploaded-files" id="hand-photo-preview"></div>
                        @error('hand_photo')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <!-- Bank Information Section -->
            <div class="form-section">
                <h2 class="section-title">البيانات البنكية</h2>
                <div class="bank-note">
                    <strong>ملاحظة:</strong> تأكد من أن البيانات البنكية صحيحة لتسهيل عملية التحويلات. 
                    <a href="#">اطلع على سياسة الخصوصية</a>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">اسم صاحب البنك</label>
                        <input type="text" name="bank_account_name" class="form-input @error('bank_account_name') is-invalid @enderror" 
                               value="{{ old('bank_account_name') }}" placeholder="أدخل اسم صاحب الحساب البنكي" required>
                        @error('bank_account_name')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">رقم الآيبان (IBAN)</label>
                        <input type="text" name="bank_iban" class="form-input @error('bank_iban') is-invalid @enderror" 
                               value="{{ old('bank_iban') }}" placeholder="SA #### ###### ###### ###### ####" required>
                        @error('bank_iban')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">رقم الحساب البنكي</label>
                        <input type="text" name="bank_account_number" class="form-input @error('bank_account_number') is-invalid @enderror" 
                               value="{{ old('bank_account_number') }}" placeholder="أدخل رقم الحساب" required>
                        @error('bank_account_number')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">إلغاء</a>
                <button type="submit" class="btn btn-primary">إرسال طلب التفعيل</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Handle file upload
    document.getElementById('hand-photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const preview = document.getElementById('hand-photo-preview');
            preview.innerHTML = `
                <div class="file-item">
                    <span>${file.name}</span>
                    <span class="file-remove" onclick="removeFile('hand-photo')">حذف</span>
                </div>
            `;
        }
    });

    function removeFile(inputId) {
        document.getElementById(inputId).value = '';
        document.getElementById(inputId + '-preview').innerHTML = '';
    }
</script>
        </div>
    </div>
</div>
@endsection
