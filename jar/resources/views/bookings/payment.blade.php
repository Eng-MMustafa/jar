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

                <form action="{{ route('bookings.payment.submit', ['booking' => $booking->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded border border-gray-100 shadow-sm">
                    @csrf

                    <div class="mb-4 text-right">
                        <div id="dropzone" class="w-full h-56 border-2 border-dashed border-gray-200 rounded-lg flex flex-col items-center justify-center text-gray-400 bg-gray-50 transition-colors">
                            <div id="drop-content" class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3 h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9M8 12l4-4 4 4"/></svg>
                                <div class="text-lg font-medium">اختر صورة إيصال الدفع</div>
                                <div class="text-sm text-gray-500 mt-1">(jpg, png) حتى 20MB</div>
                                <div class="mt-4">
                                    <label for="transfer_proof" id="choose-file" class="inline-block bg-white border border-gray-200 rounded px-4 py-2 text-teal-600 font-semibold cursor-pointer">اختر ملف</label>
                                </div>
                                <div id="selected-file" class="mt-3 text-sm text-gray-600 hidden"></div>
                            </div>

                            <input type="file" id="transfer_proof" name="transfer_proof" class="hidden" accept="image/*" required>
                        </div>

                        @error('transfer_proof')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="mt-6 text-right">
                            <label class="block text-sm text-gray-700 mb-1">ملاحظة (اختياري)</label>
                            <textarea name="transfer_note" id="transfer_note" rows="3" class="form-input w-full"></textarea>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <a href="{{ url()->previous() }}" class="inline-block px-5 py-2 rounded-lg bg-gray-100 text-teal-600 font-semibold">رجوع</a>
                            <button type="submit" id="submit-transfer" class="inline-block px-6 py-2 rounded-lg bg-teal-500 hover:bg-teal-600 text-white font-semibold">إرسال الطلب</button>
                        </div>

                        <div id="preview-area" class="mt-4 hidden">
                            <div class="p-3 border rounded flex items-center gap-3">
                                <div id="preview-thumb" class="w-16 h-16 bg-gray-100 rounded overflow-hidden flex items-center justify-center"></div>
                                <div>
                                    <div id="preview-name" class="font-medium text-sm text-right"></div>
                                    <div id="preview-type" class="text-xs text-gray-500 text-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                @if($booking->transfer_status === 'submitted')
                    <div class="mt-4 p-3 bg-green-50 text-green-700 rounded text-right">تم إرسال إيصال التحويل في {{ $booking->transfer_submitted_at?->format('d/m/Y H:i') }}</div>
                    <div class="mt-2 text-right">
                        <a href="{{ asset('storage/' . $booking->transfer_proof_path) }}" target="_blank" class="text-teal-600 font-semibold">عرض الإيصال</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const dz = document.getElementById('dropzone');
    const fileInput = document.getElementById('transfer_proof');
    const selectedFileEl = document.getElementById('selected-file');
    const previewArea = document.getElementById('preview-area');
    const previewThumb = document.getElementById('preview-thumb');
    const previewName = document.getElementById('preview-name');
    const previewType = document.getElementById('preview-type');

    const MAX_SIZE = 20 * 1024 * 1024; // 20MB
    const MIN_SIZE = 5 * 1024; // 5KB

    function showError(msg) {
        alert(msg);
    }

    function validateFile(file) {
        if (!file.type.startsWith('image/')) {
            showError('عذراً، الملف يجب أن يكون صورة فقط (JPG, PNG, ...).');
            return false;
        }
        if (file.size > MAX_SIZE) {
            showError('عذراً، حجم الملف كبير جداً (أكثر من 20 ميجابايت).');
            return false;
        }
        if (file.size < MIN_SIZE) {
            showError('عذراً، حجم الملف صغير جداً.');
            return false;
        }
        return true;
    }

    function showPreview(file) {
        selectedFileEl.textContent = file.name;
        selectedFileEl.classList.remove('hidden');
        previewArea.classList.remove('hidden');
        previewName.textContent = file.name;
        previewType.textContent = file.type;

        const objectUrl = URL.createObjectURL(file);
        previewThumb.innerHTML = '<img src="' + objectUrl + '" style="width:100%;height:100%;object-fit:cover;" />';
    }

    function clearPreview() {
        selectedFileEl.classList.add('hidden');
        previewArea.classList.add('hidden');
        previewThumb.innerHTML = '';
        fileInput.value = '';
    }

    fileInput.addEventListener('change', function(e){
        const f = e.target.files[0];
        if (f) {
            if (validateFile(f)) {
                showPreview(f);
            } else {
                clearPreview();
            }
        }
    });

    // drag & drop
    dz.addEventListener('dragover', function(e){
        e.preventDefault();
        dz.classList.add('bg-white');
        dz.classList.add('border-teal-200');
    });
    dz.addEventListener('dragleave', function(e){
        e.preventDefault();
        dz.classList.remove('bg-white');
        dz.classList.remove('border-teal-200');
    });
    dz.addEventListener('drop', function(e){
        e.preventDefault();
        dz.classList.remove('bg-white');
        dz.classList.remove('border-teal-200');

        const f = e.dataTransfer.files[0];
        if (f) {
            if (validateFile(f)) {
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(f);
                fileInput.files = dataTransfer.files;
                showPreview(f);
            }
        }
    });

    // Form Validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredInputs = this.querySelectorAll('[required]');
        let isValid = true;
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
            showError('يرجى اختيار صورة الإيصال للمتابعة.');
        }
    });
});
</script>

@endsection
