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

/* Layout helpers used across profile pages */
.profile-container {
    font-family: 'Tajawal', sans-serif;
    direction: rtl;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.profile-wrapper {
    display: grid;
    grid-template-columns: 1fr 2.5fr;
    gap: 2rem;
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
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

@media (max-width: 768px) {
    .profile-container { padding: 1rem; }
    .profile-wrapper { grid-template-columns: 1fr; }
}

.profile-sidebar {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    height: fit-content;
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--border-light);
    text-align: right;
}

.profile-header-info h2 { font-size: 1.1rem; color: var(--text-dark); margin-bottom: 0.25rem; }
.profile-header-info p { color: var(--text-light); font-size: 0.9rem; }

.profile-avatar { width: 72px; height: 72px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.5rem;position:relative; }
.avatar-badge { position:absolute; bottom:0; left:0; width:26px; height:26px; background:var(--success); border:3px solid white; border-radius:50%; display:flex; align-items:center; justify-content:center; color:white; font-size:0.65rem; }

.status-badge { display:inline-block; padding:0.35rem 0.6rem; background:#e8f5e9; color:var(--success); border-radius:16px; font-size:0.82rem; font-weight:600; margin-top:0.4rem; }

.quick-links { display:flex; flex-direction:column; gap:0; margin-top:1rem; }
.quick-links a, .quick-links form { display:flex; align-items:center; gap:0.6rem; padding:0.75rem 0; color:var(--text-dark); text-decoration:none; border-bottom:1px solid var(--border-light); font-size:0.95rem; transition:all .2s ease; }
.quick-links a:hover, .quick-links form button:hover { color:var(--primary); padding-right:0.5rem; }
.quick-links form button { background:none; border:none; padding:0.75rem 0; width:100%; text-align:right; cursor:pointer; display:flex; align-items:center; gap:0.6rem; }
.quick-links i { font-size:1rem; }
</style>

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

    <!-- Quick Links Menu -->
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
        <a href="{{ route('my-products.index') }}" title="إدارة المنتجات">
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