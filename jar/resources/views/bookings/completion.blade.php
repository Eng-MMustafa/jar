@extends('layouts.app')

@section('title', 'تأكيد الحجز - تجار')

@section('content')
<style>
    .booking-completion-container * {
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

    .booking-completion-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        direction: rtl;
    }

    .completion-wrapper {
        display: grid;
        grid-template-columns: 0.7fr 0.3fr;
        gap: 2rem;
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        align-items: start;
        direction: rtl;
    }

    /* Left Side - Price Summary */
    .price-summary {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        padding: 1.5rem;
        background: #f5f7fa;
        border-radius: 8px;
        order: 2;
    }

    .summary-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #333;
        text-align: right;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.8rem 0;
        border-bottom: 1px solid #ddd;
    }

    .summary-item:last-of-type {
        border-bottom: none;
    }

    .summary-label {
        font-size: 0.9rem;
        color: #666;
        text-align: right;
    }

    .summary-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-top: 2px solid #e0e0e0;
        border-bottom: 2px solid #e0e0e0;
        margin: 1rem 0;
    }

    .summary-total-label {
        font-size: 1rem;
        color: #333;
        text-align: right;
    }

    .summary-total-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #00bcd4;
    }

    .summary-note {
        font-size: 0.8rem;
        color: #e74c3c;
        text-align: right;
        margin-top: 0.5rem;
    }

    .btn-complete {
        width: 100%;
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
        margin-top: 1rem;
    }

    .btn-complete:hover {
        background: #0097a7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
    }

    /* Center - Product Image */
    .product-image-section {
        display: flex;
        align-items: center;
        justify-content: center;
        order: 2;
        min-height: 400px;
    }

    .product-image-container {
        width: 100%;
        height: 350px;
        background: #f0f0f0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Right Side - Booking Details */
    .booking-details {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        order: 1;
    }

    .details-section {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
    }

    .section-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #333;
        text-align: right;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid #ddd;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
    }

    .detail-label {
        font-size: 0.85rem;
        color: #999;
        text-align: right;
        flex: 1;
    }

    .detail-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        text-align: left;
        flex: 1;
    }

    .product-info-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
        direction: rtl;
    }

    .product-image {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        background: #ddd;
        flex-shrink: 0;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info-content {
        flex: 1;
        text-align: right;
    }

    .product-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.3rem;
    }

    .product-badge {
        display: inline-block;
        background: #e0f7fa;
        color: #00bcd4;
        padding: 0.3rem 0.6rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .product-price {
        font-size: 0.85rem;
        color: #666;
    }

    .lender-info-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
        direction: rtl;
    }

    .lender-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #ddd;
        flex-shrink: 0;
        overflow: hidden;
    }

    .lender-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .lender-info-content {
        flex: 1;
        text-align: right;
    }

    .lender-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.2rem;
    }

    .lender-location {
        font-size: 0.8rem;
        color: #999;
        display: flex;
        align-items: center;
        gap: 0.3rem;
        justify-content: flex-end;
    }

    .rating-display {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        justify-content: flex-end;
        font-size: 0.85rem;
        color: #666;
    }

    .rating-stars {
        color: #ffc107;
        font-size: 0.9rem;
    }

    .date-input-group {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .date-field {
        flex: 1;
    }

    .date-field label {
        display: block;
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 0.3rem;
        text-align: right;
    }

    .date-field input {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 0.85rem;
        direction: ltr;
    }

    .required {
        color: #e74c3c;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .completion-wrapper {
            grid-template-columns: 1fr;
        }

        .price-summary {
            order: 1;
            width: 100%;
        }

        .product-image-section {
            order: 2;
            width: 100%;
        }

        .booking-details {
            order: 3;
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .completion-wrapper {
            grid-template-columns: 1fr;
            padding: 1rem;
        }

        .summary-total-value {
            font-size: 1.5rem;
        }

        .product-image-container {
            height: 280px;
        }

        .date-input-group {
            flex-direction: column;
        }
    }
</style>

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('home') }}">الرئيسية</a>
    <span>/</span>
    <a href="#">طلباتى</a>
    <span>/</span>
    <span>تأكيد الحجز</span>
</div>

<!-- Main Booking Section -->
<div class="booking-completion-container">
    <div class="completion-wrapper">
        <!-- Left Side - Price Summary -->
        <div class="price-summary">
            <div class="summary-title">ملخص السعر</div>

            <div class="summary-item">
                <span class="summary-value">2 يوم</span>
                <span class="summary-label">عدد الأيام</span>
            </div>

            <div class="summary-item">
                <span class="summary-value">120 ريال</span>
                <span class="summary-label">السعر الأساسي</span>
            </div>

            <div class="summary-item">
                <span class="summary-value">10 ريال</span>
                <span class="summary-label">مبالغ التأمين</span>
            </div>

            <div class="summary-total">
                <span class="summary-total-value">130 ريال</span>
                <span class="summary-total-label">الإجمالي</span>
            </div>

            <div class="summary-note">* الأسعار شاملة للرسوم</div>

            <button class="btn-complete">إتمام الطلب</button>
        </div>

        <!-- Right Side - Booking Details -->
        <div class="booking-details">
            <!-- Product Info -->
            <div class="details-section">
                <div class="section-title">معلومات المنتج</div>
                <div class="product-info-header">
                    <div class="product-image">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="Product">
                    </div>
                    <div class="product-info-content">
                        <div class="product-name">عربية للبجار اليومي</div>
                        <div class="product-price">120 ريال / يوم</div>
                        <div class="product-badge">متاح</div>
                    </div>
                </div>
            </div>

            <!-- Lender Info -->
            <div class="details-section">
                <div class="section-title">معلومات الموجر</div>
                <div class="lender-info-header">
                    <div class="lender-avatar">
                        <img src="{{ asset('images/placeholder.svg') }}" alt="Lender">
                    </div>
                    <div class="lender-info-content">
                        <div class="lender-name">عبدالرحمن الفقحطاني</div>
                        <div class="lender-location">
                            <span>📍</span>
                            <span>القصيم - بريدة</span>
                        </div>
                    </div>
                </div>
                <div class="rating-display">
                    <span>(10 تقييمات)</span>
                    <span class="rating-stars">★★★★</span>
                </div>
            </div>

            <!-- Booking Dates -->
            <div class="details-section">
                <div class="section-title">معلومات الحجز</div>
                <div class="date-input-group">
                    <div class="date-field">
                        <label>تاريخ النهاية <span class="required">*</span></label>
                        <input type="text" placeholder="DD / MM / YYYY" value="05 / 01 / 2026">
                    </div>
                    <div class="date-field">
                        <label>تاريخ البداية <span class="required">*</span></label>
                        <input type="text" placeholder="DD / MM / YYYY" value="03 / 01 / 2026">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle button clicks
    document.addEventListener('DOMContentLoaded', function() {
        const completeBtn = document.querySelector('.btn-complete');

        if (completeBtn) {
            completeBtn.addEventListener('click', function() {
                console.log('Complete booking');
                // Add completion logic here
            });
        }
    });
</script>
@endsection
