@extends('layouts.app')

@section('title', 'تفاصيل الحساب البنكي - تجار')

@section('content')
<style>
    .bank-details-container * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .bank-details-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 3rem 2rem;
        direction: rtl;
    }

    .bank-content-wrapper {
        background: white;
        border-radius: 12px;
        padding: 4rem 3rem;
    }

    .transfer-header {
        text-align: right;
        margin-bottom: 3rem;
    }

    .transfer-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.8rem;
    }

    .transfer-subtitle {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.8;
    }

    .bank-content-sections {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .bank-section {
        margin-bottom: 0;
    }

    .bank-section:first-child {
        direction: rtl;
        text-align: right;
    }

    .bank-section:last-child {
        direction: ltr;
        text-align: left;
    }

    .bank-section-title {
        font-size: 1rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .bank-details-list {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .bank-detail-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .detail-label {
        font-size: 0.9rem;
        color: #999;
        font-weight: 500;
    }

    .detail-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        word-break: break-all;
    }

    .copy-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.2rem;
        padding: 2.5rem;
        background: #f9f9f9;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .copy-icon {
        font-size: 3rem;
    }

    .copy-text {
        font-size: 0.9rem;
        color: #666;
    }

    .copy-link {
        color: #0d9488;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .copy-link:hover {
        color: #0f766e;
        text-decoration: underline;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-direction: row-reverse;
        justify-content: flex-start;
    }

    .btn-submit {
        padding: 0.9rem 2.5rem;
        background: #0d9488;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .btn-submit:hover {
        background: #0f766e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 148, 136, 0.3);
    }

    .btn-back {
        padding: 0.9rem 2.5rem;
        background: #e0f2f7;
        color: #0d9488;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }

    .btn-back:hover {
        background: #c8e8f0;
        transform: translateY(-2px);
    }

    /* Toast Notification */
    .copy-toast {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #4caf50;
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .copy-toast.show {
        opacity: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .bank-content-wrapper {
            padding: 2rem 1.5rem;
        }

        .transfer-title {
            font-size: 1.3rem;
        }

        .bank-content-sections {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
        }
    }
</style>

<!-- Main Content -->
<div class="bank-details-container">
    <div class="bank-content-wrapper">
        <!-- Header -->
        <div class="transfer-header">
            <div class="transfer-title">تحويل بنكي</div>
            <div class="transfer-subtitle">
                يرجى إرسال تحويل بنكي لاستكمال عملية الدفع
            </div>
        </div>

        <!-- Bank Details Section -->
        <div class="bank-content-sections">
            <!-- Right Section - Bank Details -->
            <div class="bank-section">
                <div class="bank-section-title">بيانات الحساب البنكي</div>

                <div class="bank-details-list">
                    <div class="bank-detail-item">
                        <div class="detail-label">إسم صاحب الحساب</div>
                        <div class="detail-value">قهدن بنك التنمية</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">إسم البنك</div>
                        <div class="detail-value">بنك الراجحي أعمال</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">رقم الحساب</div>
                        <div class="detail-value">45345678942</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">الآيبان (IBAN)</div>
                        <div class="detail-value">SA 8283782373456638</div>
                    </div>
                </div>
            </div>

            <!-- Left Section - Additional Info -->
            <div class="bank-section">
                <div class="bank-section-title">ملاحظات هامة</div>

                <div class="bank-details-list">
                    <div class="bank-detail-item">
                        <div class="detail-label">المدة الزمنية</div>
                        <div class="detail-value">24-48 ساعة</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">حالة التحويل</div>
                        <div class="detail-value">قيد الانتظار</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">رقم المرجع</div>
                        <div class="detail-value">#TRF123456789</div>
                    </div>

                    <div class="bank-detail-item">
                        <div class="detail-label">طريقة التحويل</div>
                        <div class="detail-value">تحويل بنكي مباشر</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copy Section -->
        <div class="copy-section">
            <div class="copy-icon">📋</div>
            <div class="copy-text">اضغط صورة لنسخ المزيل</div>
            <a href="#" class="copy-link" onclick="copyBankDetails(event)">انسخ رابط</a>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-submit" onclick="submitRequest()">إرسال الطلب</button>
            <button class="btn-back" onclick="goBack()">رجوع</button>
        </div>
    </div>
</div>

<!-- Footer Pattern -->
<div style="width:100vw; overflow:hidden; margin-left:calc(50% - 50vw); margin-right:calc(50% - 50vw); height:2rem;">
    <img src="{{ asset('images/images/TJAR-PATTERN_PATTERN 2 (1) 1.png') }}" alt="pattern" style="width:100%; height:100%; object-fit:cover; display:block;">
</div>

<!-- Copy Toast Notification -->
<div class="copy-toast" id="copyToast">
    ✓ تم نسخ البيانات بنجاح
</div>

<script>
    function copyBankDetails(event) {
        event.preventDefault();

        const bankDetails = `
إسم صاحب الحساب: قهدن بنك التنمية
إسم البنك: بنك الراجحي أعمال
رقم الحساب: 45345678942
الآيبان: SA 8283782373456638
        `.trim();

        navigator.clipboard.writeText(bankDetails).then(() => {
            showToast();
        }).catch(err => {
            console.error('Failed to copy:', err);
        });
    }

    function showToast() {
        const toast = document.getElementById('copyToast');
        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    function submitRequest() {
        console.log('Submit bank transfer request');
        alert('تم إرسال طلب التحويل البنكي بنجاح');
    }

    function goBack() {
        window.history.back();
    }
</script>

@endsection
