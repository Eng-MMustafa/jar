@extends('layouts.app')

@section('title', $category->name . ' - تجار')

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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .breadcrumb span {
        color: #666;
        margin: 0 0.5rem;
    }

    .category-header {
        background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
        color: white;
        padding: 2rem;
        margin-bottom: 2rem;
        border-radius: 10px;
        text-align: right;
        direction: rtl;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .category-header h1 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .category-header p {
        font-size: 1rem;
        opacity: 0.9;
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
        color: #0d9488;
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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
        font-family: 'IBM Plex Sans Arabic', sans-serif;
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
    }
</style>

<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>></span>
        <span>الأقسام</span>
        <span>></span>
        <span>{{ $category->name }}</span>
    </div>

    <div style="display: grid; grid-template-columns: 280px 1fr; gap: 2rem; margin-bottom: 2rem;">
        <!-- Sidebar Filter -->
        <div style="background: white; padding: 1.5rem; border-radius: 10px; height: fit-content; position: sticky; top: 20px;">
            <h3 style="text-align: right; direction: rtl; margin-bottom: 1.5rem; font-size: 1.1rem; color: #333; border-bottom: 2px solid #0d9488; padding-bottom: 1rem;">
                <i class="fas fa-sliders-h" style="color: #0d9488; margin-left: 0.5rem;"></i>
                خيارات التصفية
            </h3>

            <form method="GET" action="{{ route('categories.show', $category->slug) }}" id="filterForm" style="direction: rtl;">
                <!-- Price Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <button type="button" onclick="toggleFilter(this)" style="width: 100%; text-align: right; background: none; border: none; padding: 0.8rem; font-weight: 600; color: #333; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                        <span>السعر</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="filter-content" style="padding: 0.8rem 0; border-bottom: 1px solid #eee;">
                        <input type="range" name="min_price" min="0" max="10000" value="{{ request('min_price', 0) }}" style="width: 100%;">
                        <div style="margin-top: 0.5rem; font-size: 0.85rem; color: #666; text-align: right;">
                            من <strong id="minPriceDisplay">{{ request('min_price', 0) }}</strong> ج.م
                        </div>
                        <input type="range" name="max_price" min="0" max="10000" value="{{ request('max_price', 10000) }}" style="width: 100%; margin-top: 0.5rem;">
                        <div style="margin-top: 0.5rem; font-size: 0.85rem; color: #666; text-align: right;">
                            إلى <strong id="maxPriceDisplay">{{ request('max_price', 10000) }}</strong> ج.م
                        </div>
                    </div>
                </div>

                <!-- Rental Type Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <button type="button" onclick="toggleFilter(this)" style="width: 100%; text-align: right; background: none; border: none; padding: 0.8rem; font-weight: 600; color: #333; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                        <span>نوع الإيجار</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="filter-content" style="padding: 0.8rem 0; border-bottom: 1px solid #eee;">
                        <label style="display: flex; align-items: center; margin-bottom: 0.5rem; text-align: right; direction: rtl;">
                            <input type="checkbox" name="rental_type" value="daily" {{ request('rental_type') == 'daily' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            يومي
                        </label>
                        <label style="display: flex; align-items: center; margin-bottom: 0.5rem; text-align: right; direction: rtl;">
                            <input type="checkbox" name="rental_type" value="weekly" {{ request('rental_type') == 'weekly' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            أسبوعي
                        </label>
                        <label style="display: flex; align-items: center; text-align: right; direction: rtl;">
                            <input type="checkbox" name="rental_type" value="monthly" {{ request('rental_type') == 'monthly' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            شهري
                        </label>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <button type="button" onclick="toggleFilter(this)" style="width: 100%; text-align: right; background: none; border: none; padding: 0.8rem; font-weight: 600; color: #333; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                        <span>التقييم</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="filter-content" style="padding: 0.8rem 0; border-bottom: 1px solid #eee;">
                        <label style="display: flex; align-items: center; margin-bottom: 0.5rem; text-align: right; direction: rtl;">
                            <input type="radio" name="rating" value="5" {{ request('rating') == '5' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            <span style="color: #ffc107;">★★★★★</span> (5 نجوم)
                        </label>
                        <label style="display: flex; align-items: center; margin-bottom: 0.5rem; text-align: right; direction: rtl;">
                            <input type="radio" name="rating" value="4" {{ request('rating') == '4' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            <span style="color: #ffc107;">★★★★</span> (4 نجوم فما فوق)
                        </label>
                        <label style="display: flex; align-items: center; margin-bottom: 0.5rem; text-align: right; direction: rtl;">
                            <input type="radio" name="rating" value="3" {{ request('rating') == '3' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            <span style="color: #ffc107;">★★★</span> (3 نجوم فما فوق)
                        </label>
                        <label style="display: flex; align-items: center; text-align: right; direction: rtl;">
                            <input type="radio" name="rating" value="" {{ request('rating') == '' ? 'checked' : '' }} style="margin-left: 0.5rem;">
                            كل التقييمات
                        </label>
                    </div>
                </div>

                <!-- Apply Button -->
                <button type="submit" style="width: 100%; background: #e0f2f1; color: #0d9488; border: none; padding: 1rem; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 1rem; transition: all 0.3s ease; font-family: 'IBM Plex Sans Arabic', sans-serif;">
                    تطبيق التصفية
                </button>

                <!-- Clear Filters -->
                @if(request()->hasAny(['search', 'min_price', 'max_price', 'rental_type', 'rating']))
                <a href="{{ route('categories.show', $category->slug) }}" style="width: 100%; display: block; text-align: center; background: white; color: #ff6b6b; border: 1px solid #ff6b6b; padding: 0.8rem; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 0.5rem; text-decoration: none; transition: all 0.3s ease;">
                    إزالة جميع التصفيات
                </a>
                @endif
            </form>
        </div>

        <!-- Main Content -->
        <div>

    <!-- Category Header -->
    <div class="category-header">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description_ar ?? $category->description_en ?? 'اكتشف أفضل المنتجات في هذا القسم' }}</p>
    </div>

    <!-- Filter Header -->
    <div style="background: white; padding: 1.5rem; margin-bottom: 2rem; border-radius: 10px; display: flex; gap: 1rem; align-items: center; direction: rtl; justify-content: space-between; flex-wrap: wrap;">
        <div style="display: flex; gap: 1rem; align-items: center; flex: 1; min-width: 300px;">
            <form method="GET" action="{{ route('categories.show', $category->slug) }}" style="display: flex; gap: 0.5rem; flex: 1;">
                <input type="text" name="search" placeholder="ابحث عن منتج محدد..."
                       value="{{ request('search') }}"
                       style="flex: 1; padding: 0.7rem 1rem; border: 1px solid #ddd; border-radius: 5px; font-size: 0.95rem; font-family: 'IBM Plex Sans Arabic', sans-serif;">
                <button type="submit" style="background: #0d9488; color: white; border: none; padding: 0.7rem 1.5rem; border-radius: 5px; cursor: pointer; font-weight: 600; font-family: 'IBM Plex Sans Arabic', sans-serif;">بحث</button>
            </form>
        </div>

        @if(request('search'))
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <span style="background: #f0f0f0; padding: 0.5rem 1rem; border-radius: 5px; font-size: 0.9rem;">{{ request('search') }}</span>
            <a href="{{ route('categories.show', $category->slug) }}" style="background: #ff6b6b; color: white; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none; font-weight: 600;">×</a>
        </div>
        @endif
    </div>

    <!-- Results Info -->
    <div style="background: white; padding: 1rem; margin-bottom: 2rem; border-radius: 10px; text-align: right; direction: rtl; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="color: #666; font-size: 0.95rem;">النتائج الموجودة: <strong>{{ $products->total() }}</strong> منتج</span>
        </div>
        @if(request('search'))
        <div>
            <span style="color: #0d9488; font-size: 0.9rem;">البحث عن: <strong>{{ request('search') }}</strong></span>
            <span style="color: #999; margin: 0 0.5rem;">×</span>
            <button onclick="window.location='{{ route('categories.show', $category->slug) }}'" style="background: none; border: none; color: #0d9488; cursor: pointer; font-weight: 600; text-decoration: underline; font-family: 'IBM Plex Sans Arabic', sans-serif;">إزالة البحث</button>
        </div>
        @endif
    </div>

    <!-- Products Grid -->
    <div class="products-container">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
        <div class="no-products" style="grid-column: 1/-1;">
            <i class="fas fa-box-open"></i>
            <h3>لا توجد منتجات في هذا القسم</h3>
            <p>يرجى المحاولة لاحقاً</p>
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
                <span style="padding: 0.6rem 0.9rem; background: #0d9488; color: white; border-radius: 5px; border: 1px solid #0d9488; min-width: 40px; text-align: center; font-weight: 600; font-family: 'IBM Plex Sans Arabic', sans-serif;">{{ $page }}</span>
            @else
                <a href="{{ $products->url($page) }}" style="padding: 0.6rem 0.9rem; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; min-width: 40px; text-align: center; transition: all 0.3s ease; font-family: 'IBM Plex Sans Arabic', sans-serif;">{{ $page }}</a>
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

<script>
function toggleFilter(button) {
    const content = button.nextElementSibling;
    content.style.display = content.style.display === 'none' ? 'block' : 'none';
    button.querySelector('i').classList.toggle('fa-chevron-down');
    button.querySelector('i').classList.toggle('fa-chevron-up');
}

// Update price display
document.querySelectorAll('input[type="range"]').forEach(input => {
    input.addEventListener('input', function() {
        if (this.name === 'min_price') {
            document.getElementById('minPriceDisplay').textContent = this.value;
        } else if (this.name === 'max_price') {
            document.getElementById('maxPriceDisplay').textContent = this.value;
        }
    });
});
</script>

@endsection
