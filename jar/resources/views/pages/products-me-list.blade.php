@extends('layouts.app')

@section('title', 'إدارة المنتجات - تجار')

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

    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid var(--border-light);
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .products-count {
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .btn-add-product {
        background: var(--primary);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: background 0.3s ease;
    }

    .btn-add-product:hover {
        background: var(--primary-dark);
    }

    .search-box {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        margin-bottom: 2rem;
        font-family: 'Tajawal', sans-serif;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .product-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-color: var(--primary);
    }

    .product-image {
        width: 100%;
        height: 200px;
        background: var(--bg-light);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-body {
        padding: 1rem;
    }

    .product-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        text-align: right;
    }

    .product-price {
        font-size: 0.9rem;
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
    }

    .product-status {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        background: #e8f5e9;
        color: var(--success);
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .product-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
        border-radius: 4px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-action-edit {
        color: #2196F3;
    }

    .btn-action-edit:hover {
        background: rgba(33, 150, 243, 0.1);
    }

    .btn-action-delete {
        color: var(--danger);
    }

    .btn-action-delete:hover {
        background: rgba(231, 76, 60, 0.1);
    }

    .btn-action-notify {
        color: #ff9800; /* notification bell color */
    }

    .btn-action-notify:hover {
        background: rgba(255, 152, 0, 0.08);
    }

    @media (max-width: 768px) {
        .profile-container {
            padding: 1rem;
        }

        .profile-wrapper {
            grid-template-columns: 1fr;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .products-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="profile-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <span>إدارة المنتجات</span>
    </div>

    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <div class="profile-card">
                <div class="products-header">
                    <div>
                        <h3 class="section-title">إدارة المنتجات</h3>
                        <div class="products-count">74 منتجات نشطة</div>
                    </div>
                    <a href="{{ route('my-products.create') }}" class="btn-add-product">
                        <i class="fas fa-plus"></i> إضافة منتج جديد
                    </a>
                </div>

                <input type="text" class="search-box" placeholder="ابحث عن منتج..." id="productSearch">

                <div class="products-grid">
                    <!-- Product Card 1 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>                                    <a href="#" class="btn-action btn-action-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">
                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                        <a href="{{ route('my-products.edit', 0) }}" class="btn-action btn-action-edit" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">
                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                    <a href="#" class="btn-action btn-action-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">
                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                    <a href="#" class="btn-action btn-action-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">
                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                    <a href="#" class="btn-action btn-action-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 6 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/placeholder.svg') }}" alt="منتج">
                        </div>
                        <div class="product-body">
                            <div class="product-name">عربة الفيشار البيومي</div>
                            <div class="product-price">120 ريال</div>
                            <div class="product-footer">
                                <span class="product-status">نشط</span>
                                <div class="product-actions">
                                    <a href="{{ route('notifications') }}" class="btn-action btn-action-notify" title="الإشعارات">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                    <a href="#" class="btn-action btn-action-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-action btn-action-delete" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('productSearch').addEventListener('keyup', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            const productName = card.querySelector('.product-name').textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Delete product
    document.querySelectorAll('.btn-action-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('هل تريد حذف هذا المنتج؟')) {
                // Send delete request
                alert('تم حذف المنتج');
            }
        });
    });
</script>

@endsection
