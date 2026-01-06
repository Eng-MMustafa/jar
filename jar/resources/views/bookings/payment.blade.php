@extends('layouts.app')

@section('title','تفاصيل الحساب البنكي - إتمام الدفع')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <nav class="text-sm text-gray-500 mb-4 text-right">
        <a href="{{ route('home') }}">الرئيسية</a> &nbsp; / &nbsp; <a href="#">المنتجات</a> &nbsp; / &nbsp; <span>تفاصيل الحساب البنكي</span>
    </nav>

    <div class="bg-white p-6 rounded shadow">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- Right column: bank details -->
            <div class="lg:col-span-1 text-right">
                <h3 class="font-semibold mb-3">تحويل بنكي</h3>
                <p class="text-sm text-gray-600 mb-4">يرجى رفع صورة إيصال التحويل لإتمام عملية الدفع.</p>

                <div class="bg-gray-50 p-4 rounded">
                    <div class="text-sm text-gray-700 mb-2">بيانات الحساب البنكي</div>
                    <div class="text-sm text-gray-600 mb-1"><strong>اسم صاحب الحساب: </strong> {{ auth()->user()->getFullNameAttribute() }}</div>
                    <div class="text-sm text-gray-600 mb-1"><strong>اسم البنك: </strong> بنك الراجحي أعمال</div>
                    <div class="text-sm text-gray-600 mb-1"><strong>رقم الحساب: </strong> 45345678942</div>
                    <div class="text-sm text-gray-600 mb-1"><strong>IBAN: </strong> SA 8283782373456638</div>
                </div>
            </div>

            <!-- Middle: upload box -->
            <div class="lg:col-span-2">
                <h3 class="font-semibold mb-3 text-right">رفع إيصال التحويل</h3>

                <form action="{{ route('bookings.payment.submit', ['booking' => $booking->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded border border-dashed border-gray-200">
                    @csrf

                    <div class="mb-4 text-right">
                        <div class="w-full h-40 border-2 border-gray-200 border-dashed rounded flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9M8 12l4-4 4 4"/></svg>
                                <div class="text-sm">اختر صورة إيصال الدفع</div>
                                <div class="text-xs text-gray-400">(jpg, png, pdf) حتى 5MB</div>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center gap-3">
                            <label class="btn btn-secondary inline-block">
                                اختر ملف
                                <input type="file" name="transfer_proof" class="hidden" accept="image/*,.pdf" required>
                            </label>
                            <span class="text-sm text-gray-600">أو اسحب وأفلت هنا</span>
                        </div>

                        @error('transfer_proof')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="mt-4 text-right">
                            <label class="block text-sm text-gray-700 mb-1">ملاحظة (اختياري)</label>
                            <textarea name="transfer_note" rows="3" class="form-input w-full"></textarea>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">رجوع</a>
                            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
                        </div>
                    </div>
                </form>

                @if($booking->transfer_status === 'submitted')
                    <div class="mt-4 p-3 bg-green-50 text-green-700 rounded text-right">تم إرسال إيصال التحويل في {{ $booking->transfer_submitted_at?->format('d/m/Y H:i') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection