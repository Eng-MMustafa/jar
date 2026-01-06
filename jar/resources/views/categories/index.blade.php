@extends('layouts.app')

@php abort(404) @endphp
@section('title', 'الأقسام - تجار')

@section('content')
<link href="{{ asset('css/products.css') }}" rel="stylesheet">

<div class="page-container">
    <!-- Header Section -->
    <section class="main-header">
        <div class="container">
            <h1>جميع الأقسام</h1>
            <p>اختر القسم المناسب لك وابدأ في الاستئجار</p>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="content-section">
        <div class="container">
            <div class="product-grid">
                @foreach($categories as $category)
                <div class="category-card">
                    <div class="category-image">
                        @if($category->icon)
                            <i class="category-icon {{ $category->icon }}"></i>
                        @else
                            <i class="category-icon fas fa-box"></i>
                        @endif
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">
                            {{ $category->name }}
                        </h3>
                        <p class="category-description">
                            {{ Str::limit($category->description_ar ?? $category->description_en ?? 'لا يوجد وصف متاح', 100) }}
                        </p>
                        <div class="category-count">
                            {{ $category->active_products_count }} منتج
                        </div>
                        <div style="margin-top: 1.5rem;">
                            <a href="{{ route('categories.show', $category->slug) }}" class="rent-btn">
                                عرض المنتجات
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($categories->isEmpty())
            <div class="text-center py-5">
                <div class="no-products">
                    <i class="fas fa-box-open" style="font-size: 4rem; color: #ddd; margin-bottom: 1rem;"></i>
                    <h3>لا توجد أقسام متاحة حالياً</h3>
                    <p class="text-muted">نعمل على إضافة المزيد من الأقسام قريباً</p>
                </div>
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