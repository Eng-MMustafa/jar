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
            <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded shadow" id="booking-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Step 1: Dates -->
                <div id="step-1" class="transition-opacity duration-300">
                    <h3 class="font-semibold mb-4 text-gray-800 border-b pb-2">الخطوة 1: تفاصيل الحجز</h3>

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

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end mb-6">
                        <div>
                            <label class="block text-sm text-gray-700 mb-1 text-right">الكمية</label>
                            <input type="number" name="quantity" id="quantity" min="1" value="1" class="form-input w-28">
                        </div>

                        <div class="text-right">
                            <div class="text-sm text-gray-600">السعر لكل يوم</div>
                            <div class="font-semibold">{{ number_format($product->rental_price_daily ?? $product->price ?? 0, 2) }} ر.س</div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="next-step-btn" class="btn btn-primary px-8">التالي: رفع الإيصال</button>
                    </div>
                </div>

                <!-- Step 2: Payment Proof -->
                <div id="step-2" class="hidden transition-opacity duration-300">
                    <h3 class="font-semibold mb-4 text-gray-800 border-b pb-2">الخطوة 2: إثبات الدفع</h3>

                    <!-- Bank Details Section -->
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-6">
                        <h4 class="font-semibold text-blue-800 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                            </svg>
                            بيانات التحويل البنكي
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 text-sm text-gray-700">
                            <div><strong>اسم البنك:</strong> بنك الراجحي أعمال</div>
                            <div><strong>رقم الحساب:</strong> <span class="font-mono text-gray-900">45345678942</span></div>
                            <div class="md:col-span-2"><strong>IBAN:</strong> <span class="font-mono text-gray-900">SA 8283782373456638</span></div>
                            <div class="md:col-span-2"><strong>اسم المستفيد:</strong> {{ auth()->user()->getFullNameAttribute() }}</div>
                        </div>
                        <p class="text-xs text-blue-600 mt-3">يرجى تحويل المبلغ الإجمالي <strong><span id="step2-total">0.00</span> ر.س</strong> إلى الحساب أعلاه ورفع الإيصال.</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">إيصال التحويل البنكي <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-teal-500 transition-colors bg-gray-50" id="drop-zone">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="transfer_proof" class="relative cursor-pointer bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-teal-500">
                                        <span>رفع ملف</span>
                                        <input id="transfer_proof" name="transfer_proof" type="file" class="sr-only" accept=".jpg,.jpeg,.png,.pdf">
                                    </label>
                                    <p class="pl-1">أو اسحب وأفلت</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, PDF حتى 5MB</p>
                            </div>
                        </div>
                        <div id="file-preview" class="mt-2 text-sm text-gray-600 hidden flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span id="file-name"></span>
                        </div>
                        <p id="file-error" class="mt-1 text-sm text-red-500 hidden"></p>
                    </div>

                    <div class="flex gap-3 justify-between">
                        <button type="button" id="prev-step-btn" class="btn btn-secondary">عودة</button>
                        <button type="submit" id="submit-booking" class="btn btn-primary" disabled>إتمام الطلب</button>
                    </div>
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

        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const nextBtn = document.getElementById('next-step-btn');
        const prevBtn = document.getElementById('prev-step-btn');
        const submitBtn = document.getElementById('submit-booking');
        const fileInput = document.getElementById('transfer_proof');
        const fileNameDisplay = document.getElementById('file-name');
        const filePreview = document.getElementById('file-preview');
        const fileError = document.getElementById('file-error');
        const dropZone = document.getElementById('drop-zone');

        const pricePerDay = parseFloat({{ $product->rental_price_daily ?? $product->price ?? 0 }});
        const deposit = parseFloat({{ $product->security_deposit ?? 0 }});

        let currentStep = 1;

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

            const step2TotalEl = document.getElementById('step2-total');
            if(step2TotalEl) step2TotalEl.textContent = subtotal.toFixed(2);
        }

        // Initialize flatpickr on the fields
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
            if (fileError) fileError.classList.add('hidden');
        }

        function validateDates() {
            clearErrors();
            let isValid = true;
            const start = startEl.value ? new Date(startEl.value) : null;
            const end = endEl.value ? new Date(endEl.value) : null;

            if (!start) {
                if (startError) { startError.textContent = 'الرجاء تحديد تاريخ البداية'; startError.classList.remove('hidden'); }
                isValid = false;
            }
            if (!end) {
                if (endError) { endError.textContent = 'الرجاء تحديد تاريخ النهاية'; endError.classList.remove('hidden'); }
                isValid = false;
            } else if (start && end <= start) {
                if (endError) { endError.textContent = 'تاريخ النهاية يجب أن يكون بعد تاريخ البداية'; endError.classList.remove('hidden'); }
                isValid = false;
            }
            return isValid;
        }

        function validateFile() {
            clearErrors();
            if (!fileInput.files || fileInput.files.length === 0) {
                if (fileError) { fileError.textContent = 'الرجاء رفع إيصال التحويل'; fileError.classList.remove('hidden'); }
                return false;
            }
            const file = fileInput.files[0];
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (!validTypes.includes(file.type)) {
                if (fileError) { fileError.textContent = 'نوع الملف غير مدعوم. يرجى رفع صورة (JPG, PNG) أو ملف PDF'; fileError.classList.remove('hidden'); }
                return false;
            }
            if (file.size > 5 * 1024 * 1024) {
                 if (fileError) { fileError.textContent = 'حجم الملف كبير جداً. الحد الأقصى 5 ميجابايت'; fileError.classList.remove('hidden'); }
                 return false;
            }
            return true;
        }

        function updateSummaryButton(){
            // Update button text based on step
            if (summaryBtn) {
                if (currentStep === 1) {
                    summaryBtn.textContent = 'التالي: رفع الإيصال';
                    const start = startEl.value ? new Date(startEl.value) : null;
                    const end = endEl.value ? new Date(endEl.value) : null;
                    if (!start || !end || end <= start) {
                         summaryBtn.disabled = true;
                         summaryBtn.classList.add('opacity-60', 'cursor-not-allowed');
                    } else {
                         summaryBtn.disabled = false;
                         summaryBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                    }
                } else {
                    summaryBtn.textContent = 'إتمام الطلب';
                    if (!fileInput.files || fileInput.files.length === 0) {
                        summaryBtn.disabled = true;
                        summaryBtn.classList.add('opacity-60', 'cursor-not-allowed');
                    } else {
                        summaryBtn.disabled = false;
                        summaryBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                    }
                }
            }
        }

        function goToStep2() {
            if (validateDates()) {
                currentStep = 2;
                step1.classList.add('hidden');
                step2.classList.remove('hidden');
                updateSummaryButton();
                // Scroll to top of form
                bookingForm.scrollIntoView({behavior: 'smooth'});
            }
        }

        function goToStep1() {
            currentStep = 1;
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
            updateSummaryButton();
        }

        // Event Listeners
        if (nextBtn) nextBtn.addEventListener('click', goToStep2);
        if (prevBtn) prevBtn.addEventListener('click', goToStep1);

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    const file = this.files[0];
                    if (validateFile()) {
                        fileNameDisplay.textContent = file.name;
                        filePreview.classList.remove('hidden');
                        submitBtn.disabled = false;
                        if (summaryBtn) {
                            summaryBtn.disabled = false;
                            summaryBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                        }
                    } else {
                        fileInput.value = ''; // clear invalid file
                        fileNameDisplay.textContent = '';
                        filePreview.classList.add('hidden');
                        submitBtn.disabled = true;
                        updateSummaryButton();
                    }
                } else {
                    filePreview.classList.add('hidden');
                    submitBtn.disabled = true;
                    updateSummaryButton();
                }
            });
        }

        // Drag and Drop
        if (dropZone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });
            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });
            function highlight(e) {
                dropZone.classList.add('border-teal-500', 'bg-teal-50');
            }
            function unhighlight(e) {
                dropZone.classList.remove('border-teal-500', 'bg-teal-50');
            }
            dropZone.addEventListener('drop', handleDrop, false);
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                fileInput.files = files;
                // trigger change event
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        }

        [qtyEl].forEach(el => el && el.addEventListener('change', function(){ updateSummary(); updateSummaryButton(); }));

        // Summary button action
        if (summaryBtn) {
            summaryBtn.addEventListener('click', function(e){
                e.preventDefault();
                if (currentStep === 1) {
                    goToStep2();
                } else {
                    if (validateFile()) {
                        bookingForm.submit();
                    }
                }
            });
        }

        // Initial setup
        updateSummary();
        updateSummaryButton();
    })();
</script>
@endsection
