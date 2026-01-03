@extends('layouts.app')

@section('title', $category->name_ar ?? $category->name_en . ' - تجار')

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">

<div class="page-container">
    <!-- Header Section -->
    <section class="main-header">
        <div class="container">
            <h1>{{ $category->name_ar ?? $category->name_en }}</h1>
            <p>{{ $category->description_ar ?? $category->description_en ?? 'اكتشف أفضل المنتجات في هذا القسم' }}</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="content-section">
        <div class="container">
            <!-- Products Grid -->
            <div class="product-grid">
                @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product->images && $product->images->first())
                            <img src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/placeholder-product.svg') }}" alt="{{ $product->name }}">
                        @endif
                        
                        @if($product->rating > 0)
                        <div class="product-rating">
                            <span class="rating-stars">★</span>
                            <span>{{ number_format($product->rating, 1) }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                        <div class="product-category">{{ $product->category->name_ar ?? $product->category->name_en }}</div>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">
                            @if($product->is_rentable && $product->rental_price_daily)
                                {{ number_format($product->rental_price_daily, 0) }} ج.م/يوم
                            @else
                                {{ number_format($product->price, 0) }} ج.م
                            @endif
                        </div>
                        <a href="{{ route('products.show', $product->slug) }}" class="rent-btn">
                            @if($product->is_rentable)
                                استأجر الآن
                            @else
                                اشتري الآن
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            @if($products->isEmpty())
            <div class="text-center py-5">
                <div class="no-products">
                    <i class="fas fa-box-open" style="font-size: 4rem; color: #ddd; margin-bottom: 1rem;"></i>
                    <h3>لا توجد منتجات في هذا القسم حالياً</h3>
                    <p class="text-muted">نعمل على إضافة المزيد من المنتجات قريباً</p>
                    <a href="{{ route('categories.index') }}" class="rent-btn" style="margin-top: 1rem;">
                        تصفح الأقسام الأخرى
                    </a>
                </div>
            </div>
            @endif

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
            @endif
        </div>
    </section>
</div>

<style>
.no-products {
    text-align: center;
    padding: 3rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.page-container {
    direction: rtl;
    text-align: right;
}
</style>
@endsection