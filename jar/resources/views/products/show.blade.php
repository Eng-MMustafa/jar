@extends('layouts.app')

@section('title', $product->name . ' - تجار')

@section('content')
<style>
    .product-detail-container * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .breadcrumb {
        background: #f0f7fb;
        padding: 1rem;
        text-align: right;
        direction: rtl;
        margin-bottom: 2rem;
    }

    .breadcrumb a {
        color: #00bcd4;
        text-decoration: none;
        font-weight: 600;
    }

    .breadcrumb span {
        color: #666;
        margin: 0 0.5rem;
    }

    .product-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        direction: rtl;
    }

    .product-detail-wrapper {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 2rem;
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        align-items: start;
        direction: rtl;
    }

    /* Product Info Section - Left side */
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        grid-column: 2;
        max-width: 500px;
    }

    /* Images Section - Right side */
    .product-images {
        display: flex;
        flex-direction: row;
        gap: 1rem;
        grid-column: 1;
        width: 600px;
    }

    .image-gallery {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        order: 1;
        width: 80px;
    }

    .main-image {
        width: calc(100% - 90px);
        height: 400px;
        background: #f0f0f0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        order: 2;
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-gallery img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .image-gallery img:hover,
    .image-gallery img.active {
        border-color: #00bcd4;
        transform: scale(1.02);
    }

    .product-category {
        display: inline-block;
        background: #e0f7fa;
        color: #00bcd4;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        width: fit-content;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        line-height: 1.3;
    }

    .product-description {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
    }

    .product-meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
    }

    .meta-item {
        text-align: right;
    }

    .meta-label {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 0.3rem;
    }

    .meta-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-direction: row-reverse;
    }

    .rating-stars {
        color: #ffc107;
        font-size: 1rem;
    }

    .rating-text {
        color: #666;
        font-size: 0.9rem;
    }

    .price-section {
        border-top: 2px solid #e0e0e0;
        border-bottom: 2px solid #e0e0e0;
        padding: 1.5rem 0;
    }

    .price-list {
        list-style: none;
        display: flex;
        gap: 2rem;
        justify-content: flex-end;
        direction: rtl;
    }

    .price-item {
        text-align: center;
    }

    .price-label {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 0.3rem;
    }

    .price-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #00bcd4;
    }

    .action-section {
        display: flex;
        gap: 1rem;
        flex-direction: row-reverse;
    }

    .btn-rent {
        flex: 1;
        padding: 1rem;
        background: #00bcd4;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Tajawal', sans-serif;
    }

    .btn-rent:hover {
        background: #0097a7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
    }

    .btn-favorite {
        width: 50px;
        height: 50px;
        border: 2px solid #ddd;
        border-radius: 8px;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-favorite:hover {
        border-color: #00bcd4;
        color: #00bcd4;
    }

    .btn-favorite.active {
        background: #ff6b6b;
        color: white;
        border-color: #ff6b6b;
    }

    /* Rating stars */
    .rating-star { cursor: pointer; font-size: 1.25rem; transition: transform .12s ease, color .12s ease; outline: none; }
    .rating-star:hover { color: #f59e0b; transform: scale(1.08); }
    .rating-star.text-yellow-400, .rating-star[aria-pressed="true"] { color: #f59e0b; transform: none; }
    .payment-methods {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        align-items: center;
        padding: 1rem;
        background: #f9f9f9;
        border-radius: 8px;
        margin-top: 1rem;
        direction: rtl;
    }

    .payment-label {
        font-size: 0.85rem;
        color: #999;
    }

    .payment-icons {
        display: flex;
        gap: 0.5rem;
    }

    .payment-icon {
        width: 35px;
        height: 25px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Tabs Section */
    .product-tabs {
        background: white;
        border-radius: 12px;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .tabs-header {
        display: flex;
        border-bottom: 2px solid #e0e0e0;
        direction: rtl;
    }

    .tab-btn {
        flex: 1;
        padding: 1.2rem;
        background: white;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        color: #666;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.3s ease;
        text-align: center;
    }

    .tab-btn.active {
        color: #00bcd4;
        border-bottom: 3px solid #00bcd4;
        margin-bottom: -2px;
    }

    .tab-content {
        display: none;
        padding: 2rem;
    }

    .tab-content.active {
        display: block;
    }

    .specs-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .spec-item {
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
        text-align: right;
    }

    .spec-label {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 0.3rem;
    }

    .spec-value {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
    }

    /* Reviews Section */
    .reviews-wrapper {
        display: flex;
        gap: 2rem;
        direction: rtl;
        align-items: flex-start;
        flex-direction: row-reverse;
    }

    .reviews-main-content {
        flex: 2;
        min-width: 0;
    }

    .reviews-sidebar {
        flex: 0 0 350px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* Rating Summary */
    .rating-summary {
        background: #f0f7fa;
        padding: 1.2rem;
        border-radius: 8px;
        text-align: center;
        border: 1px solid #e0f0f5;
    }

    .overall-rating {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        margin-bottom: 0.4rem;
    }

    .rating-number {
        font-size: 1.6rem;
        font-weight: 700;
        color: #333;
    }

    .rating-text {
        font-size: 0.85rem;
        color: #999;
        font-weight: 400;
    }

    .rating-stars {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        letter-spacing: 0.2rem;
    }

    .rating-count {
        color: #999;
        font-size: 0.8rem;
    }

    /* Sort Options */
    .reviews-sort {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        justify-content: flex-end;
    }

    .reviews-sort select {
        padding: 0.5rem 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
    }

    /* Reviews List */
    .reviews-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .reviews-list h3 {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 1rem;
        text-align: right;
    }

    .review-item {
        padding: 1.2rem;
        background: #f9f9f9;
        border-radius: 8px;
        text-align: right;
        direction: rtl;
    }

    .review-header {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 0.8rem;
        gap: 1rem;
        flex-wrap: wrap;
        flex-direction: row;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        direction: rtl;
        justify-content: flex-end;
    }

    .reviewer-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reviewer-details {
        text-align: right;
    }

    .reviewer-name {
        font-weight: 600;
        color: #333;
        font-size: 0.9rem;
        margin-bottom: 0.2rem;
    }

    .review-date {
        font-size: 0.8rem;
        color: #999;
    }

    .review-rating {
        color: #ffc107;
        font-size: 0.85rem;
        margin-top: 0.2rem;
    }

    .review-text {
        color: #666;
        line-height: 1.5;
        font-size: 0.9rem;
        text-align: right;
    }

    /* Load More */
    .load-more {
        text-align: center;
        margin-top: 2rem;
    }

    .btn-load-more {
        background: #e0f7fa;
        color: #00bcd4;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 6px;
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        font-weight: 600;
    }

    /* Comment Form */
    .comment-form {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 2rem;
    }

    .comment-form h3 {
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        text-align: right;
        font-weight: 600;
    }

    .comment-form h3 span {
        color: #d32f2f;
    }

    .comment-form textarea {
        width: 100%;
        height: 150px;
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        resize: vertical;
        font-family: 'Tajawal', sans-serif;
        margin-bottom: 1.5rem;
        text-align: right;
        direction: rtl;
        box-sizing: border-box;
        font-size: 0.95rem;
        color: #999;
    }

    .comment-form textarea::placeholder {
        color: #bbb;
    }

    .btn-submit-comment {
        width: 100%;
        background: #4db8c4;
        color: white;
        border: none;
        padding: 1.2rem;
        border-radius: 8px;
        cursor: pointer;
        font-family: 'Tajawal', sans-serif;
        font-weight: 600;
        font-size: 1.05rem;
        transition: all 0.3s ease;
    }

    .btn-submit-comment:hover {
        background: #3da5b1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(77, 184, 196, 0.3);
    }

    /* Owner Info */
    .owner-info {
        display: flex;
        align-items: center;
        gap: 2rem;
        direction: rtl;
    }

    .owner-avatar img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .owner-details h3 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .owner-stats {
        display: flex;
        gap: 2rem;
        margin-top: 1rem;
    }

    .stat {
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
        color: #00bcd4;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #666;
    }

    /* Description Content */
    .description-content {
        direction: rtl;
        text-align: right;
    }

    .description-content h3 {
        color: #333;
        font-size: 1.3rem;
        margin: 1.5rem 0 1rem 0;
    }

    .description-content ul {
        list-style-type: disc;
        padding-right: 2rem;
        color: #666;
        line-height: 1.6;
    }

    .description-content li {
        margin-bottom: 0.5rem;
    }

    /* Related Products */
    .related-products {
        margin-top: 3rem;
    }

    .related-products h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .related-products h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: #00bcd4;
        border-radius: 2px;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .product-image {
        width: 100%;
        height: 140px;
        overflow: hidden;
        position: relative;
        background: #f0f0f0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .rating-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255,255,255,0.95);
        padding: 6px 12px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        font-weight: bold;
    }

    .rating-star {
        color: #ffc107;
        font-size: 1rem;
    }

    .card-info {
        padding: 0.9rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: right;
        direction: rtl;
    }

    .card-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.4rem;
        line-height: 1.3;
    }

    .card-description {
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 0.4rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-footer {
        padding-top: 0.8rem;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-price {
        font-weight: 700;
        color: #00bcd4;
        font-size: 1rem;
    }

    .card-btn {
        background: #00bcd4;
        color: white;
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 600;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .card-btn:hover {
        background: #0097a7;
    }

    @media (max-width: 768px) {
        .product-detail-wrapper {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .product-info {
            order: 1;
            max-width: 100%;
        }

        .product-images {
            order: 2;
            width: 100%;
        }

        .main-image {
            height: 300px;
            width: 100%;
        }

        .image-gallery {
            flex-direction: row;
            overflow-x: auto;
            gap: 0.5rem;
            width: 100%;
        }

        .image-gallery img {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
        }

        .reviews-wrapper {
            flex-direction: column;
        }

        .reviews-sidebar {
            order: -1;
            flex: none;
            width: 100%;
        }

        .specs-grid {
            grid-template-columns: 1fr;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .price-list {
            flex-direction: column;
            gap: 1rem;
        }

        .action-section {
            flex-direction: column;
        }

        .btn-rent {
            width: 100%;
        }
    }
</style>

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('home') }}">الرئيسية</a>
    <span>/</span>
    <a href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name }}</a>
    <span>/</span>
    <span>{{ $product->name }}</span>
</div>

<!-- Main Product Details -->
<div class="product-detail-container">
    <div class="product-detail-wrapper">
        <!-- Images Section -->
        <div class="product-images">
            <div class="main-image">
                @if($product->images && $product->images->first())
                    <img id="mainImage" src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}">
                @else
                    <img id="mainImage" src="{{ asset('images/placeholder.png') }}" alt="صورة المنتج">
                @endif
            </div>

            @if($product->images && $product->images->count() > 1)
            <div class="image-gallery">
                @foreach($product->images as $image)
                    <img src="{{ asset($image->image_path) }}" 
                         alt="{{ $product->name }}"
                         onclick="changeMainImage(this)"
                         class="gallery-thumb {{ $loop->first ? 'active' : '' }}">
                @endforeach
            </div>
            @endif
        </div>

        <!-- Product Information -->
        <div class="product-info">
<div class="product-category">{{ $product->category->name }}</div>

            <h1 class="product-title">{{ $product->name }}</h1>

            <p class="product-description">{{ $product->description ?? 'مجموعة من المعدات المناسبة للأنشطة الخارجية والرياضة' }}</p>

            <!-- Rating -->
            <div class="rating">
                <div class="rating-text">{{ number_format($product->rating ?? 4.00, 2) }} من 5</div>
                <div class="rating-stars">
                    @for($i = 0; $i < 5; $i++)
                        @if($i < round($product->rating ?? 4))
                            <span>★</span>
                        @else
                            <span style="color: #ddd;">★</span>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Meta Info -->
            <div class="product-meta">
                <div class="meta-item">
                    <div class="meta-label">المخزون</div>
                    <div class="meta-value">{{ $product->stock_quantity ?? '4' }}</div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">رمز المنتج</div>
                    <div class="meta-value">#{{ $product->id }}</div>
                </div>
            </div>

            <!-- Price Section -->
            <div class="price-section">
                <ul class="price-list">
                    @if($product->rental_price_daily)
                    <li class="price-item">
                        <div class="price-label">اليومي</div>
                        <div class="price-value">{{ number_format($product->rental_price_daily, 2) }} ر.س</div>
                    </li>
                    @endif

                    @if($product->rental_price_hourly)
                    <li class="price-item">
                        <div class="price-label">بالساعة</div>
                        <div class="price-value">{{ number_format($product->rental_price_hourly, 2) }} ر.س</div>
                    </li>
                    @endif

                    @if($product->security_deposit)
                    <li class="price-item">
                        <div class="price-label">سعر التأمين</div>
                        <div class="price-value">{{ number_format($product->security_deposit, 2) }} ر.س</div>
                    </li>
                    @endif
                    @if($product->rental_price_weekly)
                    <li class="price-item">
                        <div class="price-label">الأسبوعي</div>
                        <div class="price-value">{{ number_format($product->rental_price_weekly, 2) }} ر.س</div>
                    </li>
                    @endif
                    @if($product->rental_price_monthly)
                    <li class="price-item">
                        <div class="price-label">الشهري</div>
                        <div class="price-value">{{ number_format($product->rental_price_monthly, 2) }} ر.س</div>
                    </li>
                    @endif
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="action-section">
                <button class="btn-rent">اجر الآن</button>
                <button class="btn-favorite {{ isset($isFavorited) && $isFavorited ? 'active' : '' }}" id="favoriteBtn" onclick="toggleProductFavorite(event, {{ $product->id }})">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>

                <script>
                    const isAuth = @json(auth()->check());

                    function toggleProductFavorite(e, productId){
                        e.preventDefault();

                        if (!isAuth) {
                            // redirect to login with redirect back
                            window.location = "{{ route('login') }}?redirect=" + encodeURIComponent(window.location.pathname);
                            return;
                        }

                        const btn = document.getElementById('favoriteBtn');
                        const tokenEl = document.querySelector('meta[name="csrf-token"]');
                        if (!tokenEl) return alert('Please reload the page (missing CSRF token)');
                        const token = tokenEl.getAttribute('content');

                        btn.disabled = true;

                        fetch("{{ url('/products') }}/"+productId+"/favorite", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({})
                        }).then(r => r.json()).then(data => {
                            if (!data) return;
                            if (data.favorited) {
                                btn.classList.add('active');
                            } else {
                                btn.classList.remove('active');
                            }
                        }).catch(()=> alert('خطأ, حاول مرة أخرى')).finally(()=> btn.disabled = false);
                    }
                </script>
            </div>

            <!-- Payment Methods -->
            <div class="payment-methods">
                <span class="payment-label">الدفع متاح عبر الوسائل التالية:</span>
                <div class="payment-icons">
                    <div class="payment-icon">📱</div>
                    <div class="payment-icon">💳</div>
                    <div class="payment-icon">🏦</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="product-tabs">
        <div class="tabs-header">
            <button class="tab-btn" onclick="openTab(event, 'description')">الوصف وشروط الإيجار</button>
            <button class="tab-btn" onclick="openTab(event, 'owner')">معلومات المالك</button>
            <button class="tab-btn active" onclick="openTab(event, 'reviews')">التقييمات والمراجعات</button>
        </div>

        <!-- Description Tab -->
        <div id="description" class="tab-content">
            <div class="description-content">
                <h3>وصف المنتج</h3>
                <p>{{ $product->description ?? 'مجموعة من المعدات المناسبة للأنشطة الخارجية والرياضة' }}</p>
                <h3>شروط الإيجار</h3>
                <ul>
                    <li>يجب دفع مبلغ التأمين قبل الاستلام</li>
                    <li>إرجاع المنتج في نفس الحالة المستلمة</li>
                    <li>التأخير في الإرجاع يترتب عليه رسوم إضافية</li>
                    <li>فحص المنتج قبل الاستلام مطلوب</li>
                </ul>
            </div>
        </div>

        <!-- Owner Tab -->
        <div id="owner" class="tab-content">
            <div class="owner-info">
                <div class="owner-avatar">
                    @php
                        $ownerAvatar = null;
                        if (!empty($product->user->hand_photo)) { $ownerAvatar = asset($product->user->hand_photo); }
                        elseif (!empty($product->user->avatar)) { $ownerAvatar = asset($product->user->avatar); }
                        else { $ownerAvatar = asset('images/avatar.png'); }
                    @endphp
                    <img src="{{ $ownerAvatar }}" alt="صورة المالك" onerror="this.src='https://via.placeholder.com/80'">
                </div>
                <div class="owner-details">
                    <h3>{{ $product->user->name ?? $product->user->full_name ?? 'المالك' }}</h3>
                    <p>عضو منذ {{ $product->user && $product->user->created_at ? $product->user->created_at->format('Y') : '' }}</p>
                    <div class="owner-stats">
                        <div class="stat">
                            <span class="stat-number">{{ $ownerProductsCount ?? 0 }}</span>
                            <span class="stat-label">منتج</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">{{ $ownerRentalsCount ?? 0 }}</span>
                            <span class="stat-label">تأجير</span>
                        </div>
                    </div>

                    @if(!empty($product->user->business_name) || !empty($product->user->business_description))
                        <div class="mt-3 text-right">
                            @if(!empty($product->user->business_name))
                                <div class="font-semibold">{{ $product->user->business_name }}</div>
                            @endif
                            @if(!empty($product->user->business_description))
                                <div class="text-sm text-gray-600 mt-1">{{ Str::limit($product->user->business_description, 180) }}</div>
                            @endif
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Tab -->
        <div id="reviews" class="tab-content active">
            <div class="reviews-wrapper">
                <!-- Reviews Main Content -->
                <div class="reviews-main-content">
                    <!-- Sort Options -->
                    <div class="reviews-sort">
                        <select>
                            <option>الأحدث</option>
                            <option>الأقدم</option>
                            <option>الأعلى تقييماً</option>
                        </select>
                        <span>:ترتيب حسب</span>
                    </div>

                    <!-- Reviews List -->
                    <div class="reviews-list">
                        <h3>تعليقات المستخدمين</h3>

                        {{-- تعليق: التعليقات القادمة من قاعدة البيانات ستظهر هنا --}}

                        <!-- Comments List (DB) -->
                        <div id="commentsList" class="mt-6">
                            @foreach($product->comments as $comment)
                                @include('products._comment', ['comment' => $comment])
                            @endforeach
                        </div>


                    </div>
                    
                    <div class="load-more">
                        <button class="btn-load-more">عرض المزيد</button>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="reviews-sidebar">
                    <!-- Rating Summary -->
                    <div class="rating-summary">
                        @php
                            $ratingsCount = $product->comments()->whereNotNull('rating')->count();
                            $avgRating = $ratingsCount ? round($product->comments()->whereNotNull('rating')->avg('rating'), 1) : null;
                            $fullStars = $avgRating ? (int) floor($avgRating) : 0;
                        @endphp

                        @if($ratingsCount)
                            <div class="overall-rating">
                                <span class="rating-number">{{ $avgRating }}</span>
                                <span class="rating-text">من 5</span>
                            </div>
                            <div class="rating-stars" aria-hidden="true">
                                @for($i=1;$i<=5;$i++)
                                    @if($i <= $fullStars)
                                        <span style="color: #ffc107;">★</span>
                                    @else
                                        <span style="color: #ddd;">★</span>
                                    @endif
                                @endfor
                            </div>
                            <div class="rating-count">{{ $ratingsCount }} تقييم</div>
                        @else
                            <div class="text-sm text-gray-500">لا توجد تقييمات بعد</div>
                        @endif

                    </div>

                    <!-- Comment Form (sidebar) -->
                    <div class="comment-form mt-6">
                        <h3><span>*</span> أضف تعليقك</h3>
                        <textarea id="commentBody" placeholder="يرجى إضافة تعليقك .." class="w-full border border-gray-300 rounded px-3 py-2 mt-2"></textarea>

                        <div class="mt-3">
                            <label class="block text-sm text-gray-700 mb-2">قيم المنتج</label>
                            <div id="ratingStars" class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" class="rating-star text-gray-300 cursor-pointer" data-value="{{ $i }}" aria-pressed="false" aria-label="تقييم {{ $i }} من 5">★</button>
                                @endfor
                            </div>
                            <div class="text-xs text-gray-500 mt-1">يمكنك إعطاء تقييم واحد فقط</div>
                        </div>

                        <div class="mt-3 flex items-center gap-3">
                            <button id="submitComment" class="btn-submit-comment bg-teal-600 text-white px-4 py-2 rounded">نشر تعليقك</button>
                            <div id="commentError" class="text-sm text-red-600 hidden"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="related-products">
        <h2>منتجات موصى بها</h2>
        <div class="products-grid">
            @php
                $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                    ->where('id', '!=', $product->id)
                    ->where('is_active', true)
                    ->with('images')
                    ->take(3)
                    ->get();
                
                // إذا لم توجد منتجات في نفس الفئة، جلب أي 3 منتجات
                if($relatedProducts->count() < 3) {
                    $relatedProducts = \App\Models\Product::where('id', '!=', $product->id)
                        ->where('is_active', true)
                        ->with('images')
                        ->take(3)
                        ->get();
                }
            @endphp

            @forelse($relatedProducts as $relProduct)
            <div class="product-card">
                <div class="product-image">
                    @if($relProduct->images && $relProduct->images->first())
                        <img src="{{ asset($relProduct->images->first()->image_path) }}" alt="{{ $relProduct->name }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="placeholder">
                    @endif
                    <div class="rating-badge">
                        <span class="rating-star">★</span>
                        <span>{{ $relProduct->rating ?? 4.5 }}</span>
                    </div>
                </div>

                <div class="card-info">
                    <h3 class="card-title">{{ $relProduct->name }}</h3>
                    <p class="card-description">{{ Str::limit($relProduct->description, 50) }}</p>
                    <div class="card-footer">
                        <a href="{{ route('products.show', $relProduct->slug) }}" class="card-btn">تفاصيل</a>
                        <span class="card-price">{{ $relProduct->rental_price_daily ?? 0 }} ر.س</span>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 2rem; color: #999; grid-column: 1/-1;">
                لا توجد منتجات موصى بها
            </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function changeMainImage(image) {
        const mainImg = document.getElementById('mainImage');
        if (image instanceof Element) {
            mainImg.src = image.src;
            document.querySelectorAll('.gallery-thumb').forEach(img => img.classList.remove('active'));
            image.classList.add('active');
        }
    }

    function openTab(evt, tabName) {
        const tabContents = document.querySelectorAll('.tab-content');
        const tabBtns = document.querySelectorAll('.tab-btn');

        tabContents.forEach(tab => tab.classList.remove('active'));
        tabBtns.forEach(btn => btn.classList.remove('active'));

        document.getElementById(tabName).classList.add('active');
        evt.currentTarget.classList.add('active');
    }

    // Comment submission (AJAX) with delegated rating-star clicks
    (function(){
        const isAuth = @json(auth()->check());
        let hasRated = @json($hasRated ?? false);
        const submitBtn = document.getElementById('submitComment');
        const textarea = document.getElementById('commentBody');
        const errorEl = document.getElementById('commentError');
        const commentsList = document.getElementById('commentsList');
        let selectedRating = null;

        // Delegated click for rating-stars (works even if DOM changes)
        document.addEventListener('click', function(e){
            const star = e.target.closest('.rating-star');
            if (!star) return;
            // prevent any default behaviour (form submit or focus) and stop propagation
            e.preventDefault();
            e.stopPropagation();
            star.blur();

            if (hasRated) { alert('لقد قمت بتقييم هذا المنتج سابقاً'); return; }

            const value = parseInt(star.getAttribute('data-value'));
            selectedRating = value;

            const container = document.getElementById('ratingStars');
            if (!container) return;
            const stars = Array.from(container.querySelectorAll('.rating-star'));
            stars.forEach((s, idx) => {
                const pressed = idx < value;
                s.classList.toggle('text-yellow-400', pressed);
                s.setAttribute('aria-pressed', pressed ? 'true' : 'false');
            });
        });

        if (!submitBtn) return;

        submitBtn.addEventListener('click', function(e){
            e.preventDefault();

            if (!isAuth) { window.location = "{{ route('login') }}?redirect=" + encodeURIComponent(window.location.pathname); return; }

            const body = (textarea.value || '').trim();
            if (!body) { errorEl.textContent = 'الرجاء كتابة تعليق صالح.'; errorEl.classList.remove('hidden'); return; }

            errorEl.classList.add('hidden'); submitBtn.disabled = true;

            const tokenEl = document.querySelector('meta[name="csrf-token"]');
            if (!tokenEl) { alert('Please reload the page (missing CSRF token)'); submitBtn.disabled=false; return; }
            const token = tokenEl.getAttribute('content');

            fetch("{{ route('products.comments.store', $product) }}", {
                method: 'POST', headers: { 'Content-Type': 'application/json','Accept': 'application/json','X-CSRF-TOKEN': token },
                body: JSON.stringify({ body, rating: selectedRating })
            }).then(async r => {
                if (r.status === 401) { window.location = "{{ route('login') }}?redirect=" + encodeURIComponent(window.location.pathname); return; }
                if (r.status === 422) { const json = await r.json(); errorEl.textContent = (json.errors && (json.errors.body || json.errors.rating)) ? (json.errors.body ? json.errors.body[0] : json.errors.rating[0]) : 'خطأ في الإدخال.'; errorEl.classList.remove('hidden'); return; }
                return r.json();
            }).then(data => {
                if (!data || !data.html) return;
                // Insert the new review item into the DB-driven comments container so it appears instantly
                const commentsListEl = document.getElementById('commentsList');
                if (commentsListEl) {
                    commentsListEl.insertAdjacentHTML('afterbegin', data.html);
                } else {
                    const reviewsList = document.querySelector('.reviews-list');
                    const h3 = reviewsList ? reviewsList.querySelector('h3') : null;
                    if (h3) { h3.insertAdjacentHTML('afterend', data.html); }
                }

                textarea.value = '';
                selectedRating = null;

                if (data.html && data.html.includes('review-rating')) {
                    hasRated = true;
                    const container = document.getElementById('ratingStars');
                    if (container) {
                        container.querySelectorAll('.rating-star').forEach(s => {
                            s.classList.add('opacity-50','cursor-not-allowed');
                            s.setAttribute('aria-disabled', 'true');
                        });
                        const note = document.createElement('div');
                        note.className = 'text-xs text-gray-500 mt-1';
                        note.textContent = 'لقد قمت بتقييم هذا المنتج مسبقًا.';
                        container.after(note);
                    }
                }
            }).catch(()=>{ errorEl.textContent = 'حدث خطأ، حاول مرة أخرى.'; errorEl.classList.remove('hidden'); }).finally(()=> submitBtn.disabled = false);
        });
    })();
</script>


@endsection