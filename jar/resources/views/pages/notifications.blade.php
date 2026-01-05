@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">الرئيسية</a>
        <span>/</span>
        <span>الإشعارات</span>
    </div>

    <div class="profile-wrapper">
        <!-- Sidebar -->
        @include('partials.profile-sidebar')

        <!-- Main Content -->
        <div class="profile-main">
            <div class="profile-card">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
                    <h3 class="section-title" style="margin:0;">جميع الإشعارات النشطة</h3>
                    <div class="products-count">كل الإشعارات</div>
                </div>

                <div class="notifications-list">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="notification-item" style="background:white;border:1px solid var(--border-light);border-radius:10px;padding:1rem;margin-bottom:0.75rem;display:flex;align-items:flex-start;gap:1rem;">
                        <div class="notif-icon" style="flex-shrink:0;">
                            @if($i % 4 == 0)
                            <div style="width:48px;height:48px;background:#e8f5ff;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#0288d1;">
                                <i class="fas fa-bell"></i>
                            </div>
                            @elseif($i % 4 == 1)
                            <div style="width:48px;height:48px;background:#e8f5ee;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#27ae60;">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            @else
                            <div style="width:48px;height:48px;background:#fff4e5;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#ff9800;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            @endif
                        </div>
                        <div style="flex:1;min-width:0;">
                            @if($i % 4 == 0)
                            <div style="font-weight:600;color:var(--text-dark);">تم قبول طلب الإيجار</div>
                            <div style="color:var(--text-light);font-size:0.95rem;margin-top:0.25rem;">تم قبول طلب الإيجار برقم <strong>#98873</strong> بنجاح. تستطيع الآن التواصل مع المستأجر.</div>
                            @elseif($i % 4 == 1)
                            <div style="font-weight:600;color:var(--text-dark);">تم قبول طلبك</div>
                            <div style="color:var(--text-light);font-size:0.95rem;margin-top:0.25rem;">تم قبول طلب الإيجار الخاص بك بنجاح. سيتم التواصل معك قريباً.</div>
                            @else
                            <div style="font-weight:600;color:var(--text-dark);">رسالة جديدة</div>
                            <div style="color:var(--text-light);font-size:0.95rem;margin-top:0.25rem;">لديك رسالة جديدة من خالد عبدالله</div>
                            @endif

                            <div style="color: #9aa0a6;font-size:0.85rem;margin-top:0.5rem;">29 June 2024, 9:22 PM</div>
                        </div>
                        <div style="flex-shrink:0;display:flex;flex-direction:column;gap:0.6rem;align-items:center;">
                            <a href="#" title="عرض" style="color:var(--primary);font-size:1rem;"><i class="fas fa-chevron-left"></i></a>
                            @if(Route::has('notifications.markRead'))
                            <form action="{{ route('notifications.markRead', $i) }}" method="POST">@csrf <button type="submit" style="border:none;background:none;color:#27ae60;">تم</button></form>
                            @else
                            <button type="button" style="border:none;background:none;color:#27ae60;cursor:pointer;" onclick="alert('تم وضع الإشعار كمقروء (محلياً)')">تم</button>
                            @endif
                        </div>
                    </div>
                    @endfor


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
