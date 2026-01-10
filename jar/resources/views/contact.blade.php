@extends('layouts.app')

@section('title', 'تواصل معنا - تجار')

@section('content')
<style>
    .contact-container{ max-width:1000px; margin:2rem auto; padding:1.5rem; font-family:'IBM Plex Sans Arabic',sans-serif; direction:rtl; }
    .contact-grid{ display:grid; grid-template-columns:1fr 320px; gap:1.5rem; }
    .contact-card{ background:#fff; border-radius:10px; padding:1.25rem; border:1px solid #eef6f6; box-shadow:0 2px 8px rgba(0,0,0,0.04); }
    .page-title{ font-size:1.3rem; font-weight:700; color:#333; margin-bottom:1rem; text-align:right; }
    .form-row{ display:flex; gap:0.75rem; }
    .form-input, .form-textarea{ width:100%; padding:0.75rem; border:1px solid #e6eef0; border-radius:8px; font-size:0.95rem; }
    .form-textarea{ min-height:140px; resize:vertical; }
    .btn-submit{ padding:0.75rem 1rem; background:#0d9488; color:white; border-radius:8px; text-decoration:none; display:inline-block; border:none; cursor:pointer; font-weight:700; font-family: 'IBM Plex Sans Arabic', sans-serif; }
    .btn-submit:hover{ background:#0f766e; }
    .contact-info h4{ margin:0 0 0.5rem 0; font-weight:700; }
    .contact-info p{ margin:0.25rem 0; color:#666; }
    @media (max-width: 900px){ .contact-grid{ grid-template-columns:1fr; } }
</style>

<div class="contact-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <span>تواصل معنا</span>
    </div>

    <h1 class="page-title">تواصل معنا</h1>

    <div class="contact-grid">
        <div class="contact-card">
            @if(session('success'))
                <div style="background:#e6fffb;border:1px solid #d1f0ec;padding:12px;border-radius:8px;margin-bottom:12px;color:#0e9182;font-weight:700">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div style="display:flex;gap:0.75rem;margin-bottom:0.75rem;">
                    <input type="text" name="name" class="form-input" placeholder="الاسم" value="{{ old('name') }}">
                    <input type="email" name="email" class="form-input" placeholder="البريد الإلكتروني" value="{{ old('email') }}">
                </div>
                @error('name') <div style="color:#e74c3c;margin-bottom:6px">{{ $message }}</div> @enderror
                @error('email') <div style="color:#e74c3c;margin-bottom:6px">{{ $message }}</div> @enderror

                <textarea name="message" class="form-textarea" placeholder="اكتب رسالتك هنا...">{{ old('message') }}</textarea>
                @error('message') <div style="color:#e74c3c;margin-top:6px">{{ $message }}</div> @enderror

                <div style="margin-top:12px;display:flex;justify-content:flex-start">
                    <button class="btn-submit">أرسل الرسالة</button>
                </div>
            </form>
        </div>

        <aside class="contact-card contact-info">
            <h4>معلومات التواصل</h4>
            <p><strong>البريد الإلكتروني:</strong> <a href="mailto:Support@tjar.sa">Support@tjar.sa</a></p>
            <p><strong>الهاتف:</strong> <a href="tel:+966502622021">⁦+966 50 262 2021⁩</a></p>
            <p style="margin-top:1rem;">يمكنك أيضاً التواصل عبر صفحاتنا على وسائل التواصل الاجتماعي أو عن طريق زيارة مكاتبنا خلال ساعات العمل.</p>
            <div style="display:flex; gap:1rem; justify-content:flex-start; margin-top:0.75rem; margin-bottom:0.5rem;">
                <!-- TikTok -->
                <a href="https://www.tiktok.com/@sa.tjar?_r=1&_t=ZS-92xWpSiKfOq" target="_blank" style="color:#0d9488;font-size:1.4rem;text-decoration:none;">
                    <i class="fab fa-tiktok"></i>
                </a>
                <!-- Instagram -->
                <a href="https://www.instagram.com/sa.tjar/?igsh=azE3aTJjOTBkZms0#" target="_blank" style="color:#0d9488;font-size:1.4rem;text-decoration:none;">
                    <i class="fab fa-instagram"></i>
                </a>
                <!-- Snapchat -->
                <a href="#" style="color:#0d9488;font-size:1.4rem;text-decoration:none;">
                    <i class="fab fa-snapchat-ghost"></i>
                </a>
                <!-- X (Twitter) -->
                <a href="https://x.com/sa_tjar?s=11&t=eNTjknsmhQes-wpRYcxIWg" target="_blank" style="color:#0d9488;font-size:1.4rem;text-decoration:none;">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <hr style="margin:12px 0;border:none;border-top:1px solid #eef6f6">
            <p style="color:#666;font-size:0.95rem">نحن نحترم خصوصيتك — لن نشارك معلوماتك مع طرف ثالث. سنحاول الرد خلال 48 ساعة عمل.</p>
        </aside>
    </div>
</div>
@endsection
