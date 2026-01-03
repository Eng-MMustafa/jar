@extends('layouts.app')

@section('title', $product->name . ' - تجار')

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">

<div class="page-container">
    <!-- Product Details Section -->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6">
                    <div class="product-images">
                        <div class="main-image">
                            @if($product->images && $product->images->first())
                                <img id="mainImage" src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}">
                            @else
                                <img id="mainImage" src="{{ asset('images/placeholder-product.svg') }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        
                        @if($product->images && $product->images->count() > 1)
                        <div class="image-gallery">
                            @foreach($product->images as $image)
                                <img src="{{ asset($image->image_path) }}" 
                                     alt="{{ $product->name }}"
                                     onclick="changeMainImage(this.src)"
                                     class="gallery-thumb {{ $loop->first ? 'active' : '' }}">
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-md-6">
                    <div class="product-details">
                        <!-- Breadcrumb -->
                        <nav class="breadcrumb-nav">
                            <a href="{{ route('home') }}">الرئيسية</a>
                            <span>/</span>
                            <a href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name_ar ?? $product->category->name_en }}</a>
                            <span>/</span>
                            <span>{{ $product->name }}</span>
                        </nav>

                        <h1 class="product-title-detail">{{ $product->name }}</h1>
                        
                        @if($product->rating > 0)
                        <div class="product-rating-detail">
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="rating-text">({{ $product->rating }} من 5)</span>
                            <span class="reviews-count">{{ $product->reviews_count ?? 0 }} تقييم</span>
                        </div>
                        @endif

                        <div class="price-section">
                            @if($product->is_rentable)
                                <div class="rental-prices">
                                    <div class="price-option">
                                        <span class="price-label">يومي:</span>
                                        <span class="price-value">{{ number_format($product->rental_price_daily, 0) }} ج.م</span>
                                    </div>
                                    @if($product->rental_price_weekly)
                                    <div class="price-option">
                                        <span class="price-label">أسبوعي:</span>
                                        <span class="price-value">{{ number_format($product->rental_price_weekly, 0) }} ج.م</span>
                                    </div>
                                    @endif
                                    @if($product->rental_price_monthly)
                                    <div class="price-option">
                                        <span class="price-label">شهري:</span>
                                        <span class="price-value">{{ number_format($product->rental_price_monthly, 0) }} ج.م</span>
                                    </div>
                                    @endif
                                </div>
                            @else
                                <div class="purchase-price">
                                    <span class="price-label">السعر:</span>
                                    <span class="price-value">{{ number_format($product->price, 0) }} ج.م</span>
                                </div>
                            @endif
                        </div>

                        <div class="product-description-detail">
                            <h3>الوصف</h3>
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="product-info-list">
                            <div class="info-item">
                                <strong>القسم:</strong>
                                <span>{{ $product->category->name_ar ?? $product->category->name_en }}</span>
                            </div>
                            <div class="info-item">
                                <strong>المالك:</strong>
                                <span>{{ $product->user->full_name }}</span>
                            </div>
                            @if($product->sku)
                            <div class="info-item">
                                <strong>رقم المنتج:</strong>
                                <span>{{ $product->sku }}</span>
                            </div>
                            @endif
                            <div class="info-item">
                                <strong>الحالة:</strong>
                                <span class="stock-status {{ $product->stock_quantity > 0 ? 'in-stock' : 'out-stock' }}">
                                    {{ $product->stock_quantity > 0 ? 'متاح' : 'غير متاح' }}
                                </span>
                            </div>
                        </div>

                        <div class="action-buttons">
                            @if($product->stock_quantity > 0)
                                <form method="POST" action="{{ route('cart.add', $product->id) }}" style="display: flex; gap: 1rem; flex-wrap: wrap; width: 100%;">
                                    @csrf
                                    @if($product->is_rentable)
                                        <select name="rental_period" style="padding: 15px; border: 2px solid #ddd; border-radius: 10px; font-size: 1rem;">
                                            <option value="daily">يومي</option>
                                            <option value="weekly">أسبوعي</option>
                                            <option value="monthly">شهري</option>
                                        </select>
                                    @endif
                                    <input type="number" name="quantity" value="1" min="1" style="width: 80px; padding: 15px; border: 2px solid #ddd; border-radius: 10px; font-size: 1rem;">
                                    <button type="submit" class="rent-btn-large" style="flex: 1; min-width: 200px;">
                                        {{ $product->is_rentable ? 'استأجر الآن' : 'اشتري الآن' }}
                                    </button>
                                </form>
                            @else
                                <button class="rent-btn-large disabled" disabled>غير متاح</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.page-container {
    direction: rtl;
    text-align: right;
    background: #f8f9fa;
    min-height: 100vh;
}

.product-images {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.main-image {
    margin-bottom: 1rem;
}

.main-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
}

.image-gallery {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.gallery-thumb {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}

.gallery-thumb.active,
.gallery-thumb:hover {
    border-color: #3498db;
}

.product-details {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: fit-content;
}

.breadcrumb-nav {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 1.5rem;
}

.breadcrumb-nav a {
    color: #3498db;
    text-decoration: none;
}

.breadcrumb-nav a:hover {
    text-decoration: underline;
}

.product-title-detail {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #333;
}

.product-rating-detail {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.stars {
    color: #ffc107;
}

.rating-text,
.reviews-count {
    color: #666;
    font-size: 0.9rem;
}

.price-section {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 2rem;
}

.rental-prices {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.price-option {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price-label {
    font-weight: 600;
    color: #666;
}

.price-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #27ae60;
}

.product-description-detail {
    margin-bottom: 2rem;
}

.product-description-detail h3 {
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.product-info-list {
    border-top: 1px solid #eee;
    padding-top: 1.5rem;
    margin-bottom: 2rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.stock-status.in-stock {
    color: #27ae60;
}

.stock-status.out-stock {
    color: #e74c3c;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.rent-btn-large {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.rent-btn-large:hover:not(.disabled) {
    background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
    transform: translateY(-2px);
}

.rent-btn-large.disabled {
    background: #ccc;
    cursor: not-allowed;
}

@media (max-width: 768px) {
    .action-buttons form {
        flex-direction: column !important;
    }
    
    .action-buttons select,
    .action-buttons input,
    .rent-btn-large {
        width: 100% !important;
        min-width: auto !important;
    }
}
</style>

<script>
function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
    
    // Update active thumbnail
    document.querySelectorAll('.gallery-thumb').forEach(thumb => {
        thumb.classList.remove('active');
        if (thumb.src === src) {
            thumb.classList.add('active');
        }
    });
}
</script>
@endsection