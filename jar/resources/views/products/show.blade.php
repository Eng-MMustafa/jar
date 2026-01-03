@extends('layouts.app')

@section('title', $product->name_ar ?? $product->name_en . ' - تجار')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background: #f5f7fa;
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
        flex-direction: column;
        gap: 1rem;
        grid-column: 1;
        width: 600px;
    }

    .main-image {
        width: 100%;
        height: 400px;
        background: #f0f0f0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        order: 1;
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-gallery {
        display: flex;
        flex-direction: row;
        gap: 0.5rem;
        order: 2;
        margin-top: 1rem;
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
    .reviews-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .review-item {
        padding: 1.5rem;
        background: #f9f9f9;
        border-radius: 8px;
        border-right: 4px solid #00bcd4;
        text-align: right;
        direction: rtl;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-direction: row-reverse;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-direction: row-reverse;
    }

    .reviewer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reviewer-name {
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
    }

    .review-date {
        font-size: 0.8rem;
        color: #999;
    }

    .review-rating {
        color: #ffc107;
        font-size: 0.9rem;
    }

    .review-text {
        color: #666;
        line-height: 1.6;
        font-size: 0.95rem;
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
        }

        .image-gallery {
            flex-direction: row;
            overflow-x: auto;
            gap: 0.5rem;
        }

        .image-gallery img {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
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
    <a href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name_ar ?? $product->category->name_en }}</a>
    <span>/</span>
    <span>{{ $product->name_ar ?? $product->name_en }}</span>
</div>

<!-- Main Product Details -->
<div class="product-detail-container">
    <div class="product-detail-wrapper">
        <!-- Images Section -->
        <div class="product-images">
            <div class="main-image">
                @if($product->images && $product->images->first())
                    <img id="mainImage" src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name_ar ?? $product->name_en }}">
                @else
                    <img id="mainImage" src="{{ asset('images/placeholder.png') }}" alt="صورة المنتج">
                @endif
            </div>

            @if($product->images && $product->images->count() > 1)
            <div class="image-gallery">
                @foreach($product->images as $image)
                    <img src="{{ asset($image->image_path) }}" 
                         alt="{{ $product->name_ar ?? $product->name_en }}"
                         onclick="changeMainImage(this)"
                         class="gallery-thumb {{ $loop->first ? 'active' : '' }}">
                @endforeach
            </div>
            @endif
        </div>

        <!-- Product Information -->
        <div class="product-info">
            <div class="product-category">{{ $product->category->name_ar ?? $product->category->name_en }}</div>

            <h1 class="product-title">{{ $product->name_ar ?? $product->name_en }}</h1>

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
                <button class="btn-favorite">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>
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
            <button class="tab-btn active" onclick="openTab(event, 'specs')">المواصفات</button>
            <button class="tab-btn" onclick="openTab(event, 'reviews')">التقييمات والمراجعات</button>
            <button class="tab-btn" onclick="openTab(event, 'info')">معلومات المنتج</button>
        </div>

        <!-- Specs Tab -->
        <div id="specs" class="tab-content active">
            <div class="specs-grid">
                <div class="spec-item">
                    <div class="spec-label">الفئة</div>
                    <div class="spec-value">{{ $product->category->name_ar ?? $product->category->name_en }}</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">الحالة</div>
                    <div class="spec-value">{{ $product->condition ?? 'جديد' }}</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">المورد</div>
                    <div class="spec-value">{{ $product->user->name ?? 'غير محدد' }}</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">التقييم</div>
                    <div class="spec-value">⭐ {{ $product->rating }}/5</div>
                </div>
            </div>
        </div>

        <!-- Reviews Tab -->
        <div id="reviews" class="tab-content">
            <div class="reviews-list">
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-date">13/10/2025</div>
                        <div class="reviewer-info">
                            <div>
                                <div class="reviewer-name">محمد عبدالله</div>
                                <div class="review-rating">⭐⭐⭐⭐⭐ 5.0</div>
                            </div>
                            <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="reviewer-avatar" onerror="this.src='https://via.placeholder.com/40'">
                        </div>
                    </div>
                    <div class="review-text">خدمة رائعة وسريعة جداً! المنتج كما هو موصوف تماماً وحالته ممتازة. سأتأكد من التعامل معهم مرة أخرى.</div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="review-date">10/10/2025</div>
                        <div class="reviewer-info">
                            <div>
                                <div class="reviewer-name">فاطمة أحمد</div>
                                <div class="review-rating">⭐⭐⭐⭐⭐ 5.0</div>
                            </div>
                            <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="reviewer-avatar" onerror="this.src='https://via.placeholder.com/40'">
                        </div>
                    </div>
                    <div class="review-text">احترافية عالية في التعامل والمنتج أفضل من توقعاتي. أنصح به بقوة!</div>
                </div>
            </div>
        </div>

        <!-- Info Tab -->
        <div id="info" class="tab-content">
            <div class="specs-grid">
                <div class="spec-item">
                    <div class="spec-label">عدد المبيعات</div>
                    <div class="spec-value">{{ rand(50, 500) }} عملية</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">المشاركات</div>
                    <div class="spec-value">{{ rand(100, 1000) }} مشاركة</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">تاريخ الإضافة</div>
                    <div class="spec-value">{{ $product->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">حالة المنتج</div>
                    <div class="spec-value">{{ $product->is_active ? 'متوفر' : 'غير متوفر' }}</div>
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
            @endphp

            @forelse($relatedProducts as $relProduct)
            <div class="product-card">
                <div class="product-image">
                    @if($relProduct->images && $relProduct->images->first())
                        <img src="{{ asset($relProduct->images->first()->image_path) }}" alt="{{ $relProduct->name_ar ?? $relProduct->name_en }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="placeholder">
                    @endif
                    <div class="rating-badge">
                        <span class="rating-star">★</span>
                        <span>{{ $relProduct->rating }}</span>
                    </div>
                </div>

                <div class="card-info">
                    <h3 class="card-title">{{ $relProduct->name_ar ?? $relProduct->name_en }}</h3>
                    <p class="card-description">{{ Str::limit($relProduct->description, 50) }}</p>
                    <div class="card-footer">
                        <a href="{{ route('products.show', $relProduct->slug) }}" class="card-btn">تفاصيل</a>
                        <span class="card-price">{{ $relProduct->rental_price_daily }} ر.س</span>
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
</script>


@endsection