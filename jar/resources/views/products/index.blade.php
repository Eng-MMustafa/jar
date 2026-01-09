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
        color: #0d9488;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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
        border: 1px solid transparent;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        border-color: #0d9488;
        cursor: pointer;
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
        color: #0d9488;
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
        color: #0d9488;
    }

    .rent-button {
        background: #0d9488;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .rent-button:hover {
        background: #0f766e;
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
        color: #0d9488;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .pagination-container a:hover {
        background: #f0f0f0;
    }

    .pagination-container .active {
        background: #0d9488;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }
</style>

<div style="max-width: 1200px; margin: 0 auto; padding: 1rem 1rem 0; font-family: 'IBM Plex Sans Arabic', sans-serif; direction: rtl;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem;">
        <a href="{{ route('home') }}" style="display: flex; align-items: center; text-decoration: none;">
            <img src="{{ asset('images/home-2.png') }}" alt="home" style="width: 20px; height: 20px; object-fit: contain;">
        </a>
        <img src="{{ asset('images/alt-arrow-left.png') }}" alt="arrow" style="width: 16px; height: 16px; object-fit: contain; opacity: 0.5;">
        <span style="color: #666; font-size: 0.9rem;">جميع المنتجات</span>
    </div>
</div>

<div class="container">
    <!-- Filter Header -->
    <div class="filter-header" style="flex-wrap: wrap; gap: 2rem;">
        <!-- Search Section -->
        <div style="display: flex; gap: 1rem; align-items: center; justify-content: flex-start; width: 100%; min-width: 400px;">
            <form method="GET" action="{{ route('products.index') }}" style="display: flex; gap: 0.5rem; margin-right: 64px; border: 1px solid #ddd; border-radius: 10px; width: 100%; max-width: 600px; background: white;">
                <input type="text" name="search" placeholder="البحث عن منتج..." value="{{ request('search') }}"
                       style="flex: 1; outline: none; border-radius: 5px; padding: 12px 8px; font-size: 0.95rem; font-family: 'IBM Plex Sans Arabic', sans-serif; text-align: right; text-indent: 1em; border: none;">
                <img src="{{ asset('images/rounded-magnifer.png') }}" alt="search" style="width: 24px; height: 24px; object-fit: contain; margin: 10px;">
            </form>
        </div>

        <!-- Filter & Sort -->
        <div style="display: flex; gap: 1rem; align-items: center; width: 100%;">
            <div style="flex: 1;">
                <button style="background: none; border: 1px solid #ddd; padding: 0.7rem 1rem; border-radius: 8px; display: flex; align-items: center; gap: 0.5rem; cursor: pointer; color: #666;">
                    <img src="{{ asset('images/filter.png') }}" alt="filter" style="width: 20px; height: 20px;">
                    <span>تصفية</span>
                </button>
            </div>

            <button type="submit" form="search-form" style="width: 100%; max-width: 200px; background: #e0f2f1; color: #0d9488; border: none; padding: 1rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-family: 'IBM Plex Sans Arabic', sans-serif;" onmouseover="this.style.backgroundColor='#00a5a5'; this.style.color='white';" onmouseout="this.style.backgroundColor='#e0f2f1'; this.style.color='#0d9488';">
                تطبيق
            </button>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="products-container">
        @forelse($products as $product)
            <x-product-card :product="$product" />
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
            <a href="{{ $products->previousPageUrl() }}" style="padding: 0.6rem 0.8rem; color: #0d9488; cursor: pointer; border: 1px solid #0d9488; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
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
                <span style="padding: 0.6rem 0.9rem; background: #0d9488; color: white; border-radius: 5px; border: 1px solid #0d9488; min-width: 40px; text-align: center; font-weight: 600;">{{ $page }}</span>
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
            <a href="{{ $products->nextPageUrl() }}" style="padding: 0.6rem 0.8rem; color: #0d9488; cursor: pointer; border: 1px solid #0d9488; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
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
