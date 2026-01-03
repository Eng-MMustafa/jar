@extends('layouts.app')

@section('title', 'حسابي - تجار')

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

    .profile-container {
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

    /* Main Content */
    .profile-main {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Profile Card */
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

    /* Sidebar Content */
    .sidebar-item {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-light);
        text-align: right;
    }

    .sidebar-item:last-child {
        border-bottom: none;
    }

    .sidebar-label {
        color: var(--text-light);
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
    }

    .sidebar-value {
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.95rem;
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

    /* Section Title */
    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid var(--border-light);
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
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

    .form-input {
        padding: 0.75rem;
        border: 1px solid var(--border-light);
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

    .form-input:disabled {
        background: var(--bg-light);
        cursor: not-allowed;
    }

    /* Info Box */
    .info-box {
        background: #e3f2fd;
        border-right: 4px solid var(--primary);
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        color: var(--text-dark);
        text-align: right;
    }

    /* Password Fields */
    .password-field {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        left: 10px;
        top: 35px;
        cursor: pointer;
        color: var(--text-light);
        font-size: 1.1rem;
    }

    .form-input.with-toggle {
        padding-left: 40px;
    }

    /* Buttons */
    .btn-group {
        display: flex;
        gap: 1rem;
        justify-content: flex-start;
        margin-top: 1.5rem;
        flex-wrap: wrap;
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

    .btn-danger {
        background: #ffebee;
        color: var(--danger);
        border: 1px solid #ffcdd2;
    }

    .btn-danger:hover {
        background: #ffcdd2;
    }

    .btn-small {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
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

    .alert-info {
        background: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    /* Tabs */
    .profile-tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid var(--border-light);
        overflow-x: auto;
    }

    .tab-button {
        padding: 0.75rem 1.5rem;
        background: none;
        border: none;
        border-bottom: 3px solid transparent;
        color: var(--text-light);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Tajawal', sans-serif;
        white-space: nowrap;
    }

    .tab-button.active {
        color: var(--primary);
        border-bottom-color: var(--primary);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-container {
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

        .profile-tabs {
            flex-wrap: wrap;
        }

        .tab-button {
            flex: 1;
            min-width: 150px;
        }
    }
</style>

<div class="profile-container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <span>حسابي</span>
    </div>

    <!-- Profile Wrapper -->
    <div class="profile-wrapper">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-header">
                <div class="profile-header-info">
                    <h2>{{ auth()->user()->full_name }}</h2>
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

            <div class="sidebar-item">
                <div class="sidebar-label">رقم الهاتف</div>
                <div class="sidebar-value">{{ auth()->user()->phone ?? 'لم يتم إدراج الهاتف' }}</div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-label">رقم المحمول</div>
                <div class="sidebar-value">{{ auth()->user()->phone ?? '05xxxxxxxxx' }}</div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-label">المدينة</div>
                <div class="sidebar-value">{{ auth()->user()->city ?? 'الرياض' }}</div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-label">تاريخ التسجيل</div>
                <div class="sidebar-value">{{ auth()->user()->created_at->format('Y-m-d') }}</div>
            </div>

            <div class="btn-group" style="margin-top: 2rem;">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-small">تعديل البيانات</a>
                <button type="button" class="btn btn-secondary btn-small" onclick="alert('حفظ البيانات')">حفظ البيانات</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="profile-main">
            <!-- Display Messages -->
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

            <!-- Personal Information Tab -->
            <div class="profile-card">
                <div class="profile-tabs">
                    <button class="tab-button active" onclick="switchTab('personal')">البيانات الشخصية</button>
                    <button class="tab-button" onclick="switchTab('password')">تغيير كلمة المرور</button>
                </div>

                <!-- Personal Information Section -->
                <div id="personal" class="tab-content active">
                    <h3 class="section-title">البيانات الشخصية</h3>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-section">
                            <div class="form-group">
                                <label class="form-label required">الاسم الأول</label>
                                <input type="text" name="first_name" class="form-input" 
                                       value="{{ auth()->user()->first_name }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">الاسم الأخير</label>
                                <input type="text" name="last_name" class="form-input" 
                                       value="{{ auth()->user()->last_name }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-input" 
                                       value="{{ auth()->user()->email }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">رقم الهاتف</label>
                                <input type="tel" name="phone" class="form-input" 
                                       value="{{ auth()->user()->phone }}" placeholder="05xxxxxxxxx" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">المدينة</label>
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

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">إلغاء</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Password Change Section -->
                <div id="password" class="tab-content">
                    <h3 class="section-title">تغيير كلمة المرور</h3>

                    <div class="info-box">
                        <strong>ملاحظة:</strong> أدخل كلمة المرور الحالية ثم كلمة المرور الجديدة لتحديثها
                    </div>

                    <form action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-section">
                            <div class="form-group password-field">
                                <label class="form-label required">كلمة المرور الحالية</label>
                                <input type="password" name="current_password" class="form-input with-toggle" required>
                                <span class="toggle-password" onclick="togglePassword(this)">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <div class="form-group password-field">
                                <label class="form-label required">كلمة المرور الجديدة</label>
                                <input type="password" name="password" class="form-input with-toggle" required>
                                <span class="toggle-password" onclick="togglePassword(this)">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <div class="form-group password-field">
                                <label class="form-label required">تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" class="form-input with-toggle" required>
                                <span class="toggle-password" onclick="togglePassword(this)">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">تحديث كلمة المرور</button>
                                <button type="reset" class="btn btn-secondary">إعادة تعيين</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Options -->
            <div class="profile-card">
                <h3 class="section-title">خيارات إضافية</h3>

                <div class="btn-group" style="margin: 0;">
                    @if(auth()->user()->type !== 'lender')
                        <a href="{{ route('profile.activate-renter') }}" class="btn btn-primary">
                            <i class="fas fa-user-tie"></i> تفعيل حساب المؤجر
                        </a>
                    @endif
                    
                    <a href="{{ route('profile.bookings') }}" class="btn btn-secondary">
                        <i class="fas fa-calendar"></i> حجوزاتي
                    </a>
                    
                    <a href="{{ route('profile.support-tickets') }}" class="btn btn-secondary">
                        <i class="fas fa-headset"></i> دعم العملاء
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.classList.remove('active'));

        // Deactivate all buttons
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => btn.classList.remove('active'));

        // Show selected tab
        document.getElementById(tabName).classList.add('active');

        // Activate clicked button
        event.target.classList.add('active');
    }

    function togglePassword(element) {
        const input = element.previousElementSibling;
        const icon = element.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
