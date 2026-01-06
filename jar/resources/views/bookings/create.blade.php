@extends('layouts.app')

@section('title', 'إنشاء حجز')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">إتمام الحجز</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <!-- Right: Form and product info (placed first in DOM so it appears on the right in RTL) -->
        <main class="lg:col-span-2 space-y-5 order-1 lg:order-none">
            <!-- Product card + availability -->
            <div class="bg-white p-5 rounded shadow-sm flex items-center gap-4">
                <div class="w-24 h-20 overflow-hidden rounded">
                    @if($product->images->first())
                        <img src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('images/placeholder.svg') }}" alt="placeholder" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="flex-1 text-right">
                    <h2 class="font-semibold">{{ $product->name }}</h2>
                    <div class="text-sm text-gray-500">{{ number_format($product->rental_price_daily ?? $product->price ?? 0, 2) }} ر.س / يوم</div>
                </div>
                <div class="text-left">
                    <span class="inline-block bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs">متاح</span>
                </div>
            </div>

            <!-- Lender info + rating -->
            <div class="bg-white p-5 rounded shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Lender" class="w-full h-full object-cover">
                        </div>
                        <div class="text-right">
                            <div class="font-semibold">{{ $product->user?->getFullNameAttribute() ?? 'المؤجر' }}</div>
                            <div class="text-xs text-gray-500">{{ $product->user?->city ?? '' }}</div>
                        </div>
                    </div>
                    <div class="text-right text-sm text-gray-600">
                        <span class="text-yellow-500">★★★★★</span>
                        <div class="text-xs mt-1">تقييمات ({{ $product->reviews_count ?? 0 }})</div>
                    </div>
                </div>
            </div>

            <!-- Booking form -->
            <form action="{{ route('bookings.store') }}" method="POST" class="bg-white p-5 rounded shadow" id="booking-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div class="relative">
                        <label class="block text-sm text-gray-700 mb-1 text-right">تاريخ البداية <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400">
                                <!-- Calendar SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </span>
                            <input type="text" name="start_date" id="start_date" required class="form-input w-full pl-10 text-center" placeholder="DD / MM / YYYY" autocomplete="off" />
                        </div>
                        <p id="start-error" class="mt-1 text-sm text-red-500 hidden"></p>
                    </div>

                    <div class="relative">
                        <label class="block text-sm text-gray-700 mb-1 text-right">تاريخ النهاية <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </span>
                            <input type="text" name="end_date" id="end_date" required class="form-input w-full pl-10 text-center" placeholder="DD / MM / YYYY" autocomplete="off" />
                        </div>
                        <p id="end-error" class="mt-1 text-sm text-red-500 hidden"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 text-right">الكمية</label>
                        <input type="number" name="quantity" id="quantity" min="1" value="1" class="form-input w-28">
                    </div>

                    <div class="text-right">
                        <div class="text-sm text-gray-600">السعر لكل يوم</div>
                        <div class="font-semibold">{{ number_format($product->rental_price_daily ?? $product->price ?? 0, 2) }} ر.س</div>
                    </div>
                </div>

                <div class="mt-4 flex gap-3">
                    <button type="submit" id="submit-booking" class="btn btn-primary">تأكيد الحجز</button>
                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </main>

        <!-- Left: Price summary (matches screenshot style) -->
        <aside class="lg:col-span-1 bg-white p-6 rounded shadow-md h-full sticky top-24 order-2 lg:order-none" aria-labelledby="summary-title">
            <h2 id="summary-title" class="text-lg font-semibold mb-4 text-right">ملخص السعر</h2>

            <div class="mb-4 flex justify-between text-right">
                <span class="text-sm text-gray-600">عدد الأيام</span>
                <span id="summary-days" class="font-medium">-</span>
            </div>

            <div class="mb-3 flex justify-between text-right">
                <span class="text-sm text-gray-600">السعر الأساسي</span>
                <span id="summary-price-per-day" class="font-medium">{{ number_format($product->rental_price_daily ?? $product->price ?? 0, 2) }} ر.س</span>
            </div>

            <div class="mb-3 flex justify-between text-right">
                <span class="text-sm text-gray-600">مبلغ التأمين</span>
                <span id="summary-deposit" class="font-medium">{{ number_format($product->security_deposit ?? 0, 2) }} ر.س</span>
            </div>

            <div class="summary-total border-t pt-3 mt-3 flex justify-between items-center">
                <span class="text-lg font-semibold">الإجمالي</span>
                <span id="summary-total" class="text-xl font-bold text-teal-600">-</span>
            </div>

            <p class="text-xs text-gray-500 mt-3">* الأسعار شاملة للضرائب والرسوم</p>

            <button id="summary-complete" class="mt-6 w-full py-3 bg-teal-500 hover:bg-teal-600 text-white rounded-lg font-semibold">إتمام الطلب</button>
        </aside>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
<script>
    // Simple client-side calculation to show the totals (will be validated server-side)
    (function(){
        const startEl = document.getElementById('start_date');
        const endEl = document.getElementById('end_date');
        const qtyEl = document.getElementById('quantity');
        const daysEl = document.getElementById('summary-days');
        const priceEl = document.getElementById('summary-price-per-day');
        const depositEl = document.getElementById('summary-deposit');
        const totalEl = document.getElementById('summary-total');

        const pricePerDay = parseFloat({{ $product->rental_price_daily ?? $product->price ?? 0 }});
        const deposit = parseFloat({{ $product->security_deposit ?? 0 }});

        function dateDiffInDays(a, b) {
            const diff = (b - a) / (1000 * 60 * 60 * 24);
            return Math.max(1, Math.floor(diff));
        }

        function updateSummary(){
            const start = startEl.value ? new Date(startEl.value) : null;
            const end = endEl.value ? new Date(endEl.value) : null;
            const qty = parseInt(qtyEl.value) || 1;

            if (!start || !end) {
                daysEl.textContent = '-';
                totalEl.textContent = '-';
                return;
            }

            const days = dateDiffInDays(start, end);
            const subtotal = (days * pricePerDay * qty) + (deposit * qty);

            daysEl.textContent = days + ' يوم';
            priceEl.textContent = pricePerDay.toFixed(2) + ' ر.س';
            depositEl.textContent = deposit.toFixed(2) + ' ر.س';
            totalEl.textContent = subtotal.toFixed(2) + ' ر.س';
        }

        // Initialize flatpickr on the fields (uses altInput to display DD / MM / YYYY while submitting YYYY-MM-DD)
        const startPicker = flatpickr(startEl, {
            altInput: true,
            altFormat: 'd / m / Y',
            dateFormat: 'Y-m-d',
            minDate: 'today',
            locale: 'ar',
            allowInput: true,
            altInputClass: 'form-input w-full text-center',
            onChange: function(selectedDates){
                if (selectedDates.length) {
                    endPicker.set('minDate', selectedDates[0]);
                }
                updateSummary();
                updateSummaryButton();
            }
        });

        const endPicker = flatpickr(endEl, {
            altInput: true,
            altFormat: 'd / m / Y',
            dateFormat: 'Y-m-d',
            minDate: 'today',
            locale: 'ar',
            allowInput: true,
            altInputClass: 'form-input w-full text-center',
            onChange: function(){
                updateSummary();
                updateSummaryButton();
            }
        });

        const summaryBtn = document.getElementById('summary-complete');
        const bookingForm = document.getElementById('booking-form');
        const startError = document.getElementById('start-error');
        const endError = document.getElementById('end-error');

        function clearErrors(){
            if (startError) startError.classList.add('hidden');
            if (endError) endError.classList.add('hidden');
        }

        function updateSummaryButton(){
            const start = startEl.value ? new Date(startEl.value) : null;
            const end = endEl.value ? new Date(endEl.value) : null;
            if (!start || !end || end <= start) {
                summaryBtn.disabled = true;
                summaryBtn.classList.add('opacity-60', 'cursor-not-allowed');
            } else {
                summaryBtn.disabled = false;
                summaryBtn.classList.remove('opacity-60', 'cursor-not-allowed');
            }
        }

        [qtyEl].forEach(el => el && el.addEventListener('change', function(){ updateSummary(); updateSummaryButton(); }));

        // Make summary complete button submit the form
        if (summaryBtn) {
            summaryBtn.addEventListener('click', function(e){
                e.preventDefault();
                clearErrors();
                const start = startEl.value ? new Date(startEl.value) : null;
                const end = endEl.value ? new Date(endEl.value) : null;
                if (!start) {
                    if (startError) { startError.textContent = 'الرجاء تحديد تاريخ البداية'; startError.classList.remove('hidden'); }
                    return;
                }
                if (!end || end <= start) {
                    if (endError) { endError.textContent = 'الرجاء تحديد تاريخ النهاية بشكل صحيح'; endError.classList.remove('hidden'); }
                    return;
                }
                bookingForm.submit();
            });
        }

        // initial call
        updateSummary();
        updateSummaryButton();
    })();
</script>
@endsection
