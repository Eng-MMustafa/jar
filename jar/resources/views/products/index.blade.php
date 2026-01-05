@extends('layouts.app')

@section('title', 'جميع المنتجات - تجار')

@section('content')
<style>
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

    .filter-header {
        background: white;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-radius: 10px;
        display: flex;
        gap: 1rem;
        align-items: center;
        direction: rtl;
        justify-content: flex-end;
    }

    .filter-header select,
    .filter-header input {
        padding: 0.7rem 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.95rem;
    }

    .products-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
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

    .product-info {
        padding: 0.9rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: right;
        direction: rtl;
    }

    .product-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.4rem;
        line-height: 1.3;
    }

    .product-description {
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 0.4rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-category {
        font-size: 0.75rem;
        color: #00bcd4;
        font-weight: 600;
        margin-bottom: 0.8rem;
    }

    .product-footer {
        padding-top: 1rem;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        direction: rtl;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: 700;
        color: #00bcd4;
    }

    .rent-button {
        background: #00bcd4;
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .rent-button:hover {
        background: #00a8b8;
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin: 2rem 0;
    }

    .pagination-container a,
    .pagination-container span {
        padding: 0.6rem 0.9rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        color: #00bcd4;
    }

    .pagination-container a:hover {
        background: #f0f0f0;
    }

    .pagination-container .active {
        background: #00bcd4;
        color: white;
    }

    .no-products {
        text-align: center;
        padding: 4rem;
        background: white;
        border-radius: 12px;
    }

    .no-products i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 1rem;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
</style>

<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>></span>
        <span>جميع المنتجات</span>
    </div>

    <!-- Filter Header -->
    <div class="filter-header">
        <form method="GET" action="{{ route('products.index') }}" style="display: flex; gap: 1rem; width: 100%; justify-content: flex-end; align-items: center;">
            <button type="submit" style="background: #00bcd4; color: white; border: none; padding: 0.7rem 1.5rem; border-radius: 5px; cursor: pointer; font-weight: 600;">بحث</button>
            
            <input type="text" name="search" placeholder="البحث عن منتج..." 
                   value="{{ request('search') }}" style="width: 200px;">
            
            <select name="category" style="width: 150px;">
                <option value="">جميع الأقسام</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name_ar ?? $category->name_en }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- Products Grid -->
    <div class="products-container">
        @forelse($products as $product)
        <div class="product-card">
            <div class="product-image">
                @if($product->images && $product->images->first())
                    <img src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/placeholder-product.svg') }}" alt="{{ $product->name }}">
                @endif
                
                @if($product->rating > 0)
                <div class="rating-badge">
                    <span class="rating-star">★</span>
                    <span>{{ number_format($product->rating, 1) }}</span>
                </div>
                @endif
            </div>
            
            <div class="product-info">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                <div class="product-category">{{ $product->category->name_ar ?? $product->category->name_en }}</div>
                
                <div class="product-footer">
                    <a href="{{ route('products.show', $product->slug) }}" class="rent-button">
                        استأجر
                    </a>
                    <div class="product-price">
                        @if($product->is_rentable && $product->rental_price_daily)
                            ج.م {{ number_format($product->rental_price_daily, 0) }}
                        @else
                            ج.م {{ number_format($product->price, 0) }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="no-products" style="grid-column: 1/-1;">
            <i class="fas fa-box-open"></i>
            <h3>لا توجد منتجات متاحة</h3>
            <p>جرب تغيير البحث أو الفئة</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
    <div style="display: flex; justify-content: center; align-items: center; gap: 0.3rem; margin: 3rem 0; direction: rtl;">
        <!-- Previous Button -->
        @if($products->onFirstPage())
            <span style="padding: 0.6rem 0.8rem; color: #ccc; cursor: not-allowed; border: 1px solid #ddd; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $products->previousPageUrl() }}" style="padding: 0.6rem 0.8rem; color: #00bcd4; cursor: pointer; border: 1px solid #00bcd4; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        <!-- Page Numbers -->
        @php
            $current = $products->currentPage();
            $last = $products->lastPage();
            $delta = 2;
        @endphp

        @if($current - $delta > 1)
            <a href="{{ $products->url(1) }}" style="padding: 0.6rem 0.9rem; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; min-width: 40px; text-align: center;">1</a>
            <span style="color: #999;">...</span>
        @endif

        @for($page = max(1, $current - $delta); $page <= min($last, $current + $delta); $page++)
            @if($page == $current)
                <span style="padding: 0.6rem 0.9rem; background: #00bcd4; color: white; border-radius: 5px; border: 1px solid #00bcd4; min-width: 40px; text-align: center; font-weight: 600;">{{ $page }}</span>
            @else
                <a href="{{ $products->url($page) }}" style="padding: 0.6rem 0.9rem; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; min-width: 40px; text-align: center; transition: all 0.3s ease;">{{ $page }}</a>
            @endif
        @endfor

        @if($current + $delta < $last)
            <span style="color: #999;">...</span>
            <a href="{{ $products->url($last) }}" style="padding: 0.6rem 0.9rem; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; min-width: 40px; text-align: center;">{{ $last }}</a>
        @endif

        <!-- Next Button -->
        @if($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" style="padding: 0.6rem 0.8rem; color: #00bcd4; cursor: pointer; border: 1px solid #00bcd4; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span style="padding: 0.6rem 0.8rem; color: #ccc; cursor: not-allowed; border: 1px solid #ddd; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </div>
    @endif
</div>

@endsection