@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="direction: rtl;">
    <div class="w-full max-w-md mx-auto bg-white rounded-3xl shadow-xl p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo/TJAR-LOGO-V1-01 1.svg') }}" alt="TJAR Logo" class="w-20 h-20 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-teal-600 mb-2">رمز التحقق</h2>
            <p class="text-gray-600 text-sm">تم إرسال الرمز الخاص بالتحقق إلى:</p>
            <p class="text-gray-700 font-semibold mt-1">+966{{ session('phone', '••••••••35') }}</p>
        </div>

        <!-- OTP Form -->
        <form method="POST" action="{{ route('otp.verify') }}" class="space-y-6">
            @csrf

            <!-- OTP Input Fields -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-4">
                    <span class="text-red-500">*</span> الرمز
                </label>
                <div id="otpContainer" class="flex gap-2 justify-center" style="direction: ltr;">
                    <input type="text" class="otp-input w-12 h-12 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" maxlength="1" inputmode="numeric" required>
                    <input type="text" class="otp-input w-12 h-12 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" maxlength="1" inputmode="numeric" required>
                    <input type="text" class="otp-input w-12 h-12 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" maxlength="1" inputmode="numeric" required>
                    <input type="text" class="otp-input w-12 h-12 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" maxlength="1" inputmode="numeric" required>
                    <input type="text" class="otp-input w-12 h-12 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent" maxlength="1" inputmode="numeric" required>
                </div>
                <input type="hidden" id="otpValue" name="otp_code" value="">
            </div>

            @if ($errors->any())
                <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Timer -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    إعادة إرسال الرمز بعد: <span id="timer" class="text-teal-600 font-bold">1:59</span>
                </p>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-3 px-4 bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-600 hover:to-emerald-600 text-white font-bold rounded-lg transition transform hover:scale-105 flex items-center justify-center"
            >
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                تأكيد الرمز
            </button>

            <!-- Resend OTP -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    لم تستقبل الرمز؟ 
                    <button 
                        type="button" 
                        id="resendBtn" 
                        class="text-teal-600 hover:text-teal-700 font-semibold disabled:text-gray-400 disabled:cursor-not-allowed"
                        disabled
                    >
                        إعادة إرسال
                    </button>
                </p>
            </div>

            <!-- Change Phone Number -->
            <div class="text-center pt-4 border-t border-gray-200">
                <a href="{{ route('password.request') }}" class="text-sm text-teal-600 hover:text-teal-700 font-semibold">
                    تغيير رقم الجوال
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// OTP Input Handler
const otpInputs = document.querySelectorAll('.otp-input');
const otpValue = document.getElementById('otpValue');

otpInputs.forEach((input, index) => {
    input.addEventListener('input', (e) => {
        if (e.target.value.length === 1) {
            if (index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        }
        updateOtpValue();
    });

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && e.target.value === '') {
            if (index > 0) {
                otpInputs[index - 1].focus();
            }
        }
    });

    input.addEventListener('keydown', (e) => {
        if (!/^\d$/.test(e.key) && e.key !== 'Backspace') {
            e.preventDefault();
        }
    });
});

function updateOtpValue() {
    const otp = Array.from(otpInputs).map(input => input.value).join('');
    otpValue.value = otp;
}

// Timer Handler
let timeLeft = 119; // 1:59
const timerDisplay = document.getElementById('timer');
const resendBtn = document.getElementById('resendBtn');

const timerInterval = setInterval(() => {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerDisplay.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

    if (timeLeft <= 0) {
        clearInterval(timerInterval);
        resendBtn.disabled = false;
    }

    timeLeft--;
}, 1000);

// Resend OTP Handler
resendBtn.addEventListener('click', (e) => {
    e.preventDefault();
    // Add logic to resend OTP
    timeLeft = 119;
    resendBtn.disabled = true;
    
    // Make API call to resend OTP
    fetch('{{ route("otp.resend") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }).then(response => {
        if (response.ok) {
            alert('تم إعادة إرسال الرمز بنجاح');
        }
    });
});

// Focus on first input on page load
otpInputs[0].focus();
</script>
@endsection
