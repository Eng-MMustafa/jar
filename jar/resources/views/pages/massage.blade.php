@extends('layouts.app')

@section('content')
<div dir="rtl" class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">خدمات المساج</h1>
        </div>
    </div>

    <!-- Service Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                <!-- Service Image -->
                <div class="relative bg-gray-200 h-48">
                    <img src="https://via.placeholder.com/300x200?text=Massage+Service" alt="Service" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                    <span class="absolute bottom-3 right-3 text-white font-semibold text-lg">ر.س 150</span>
                </div>

                <!-- Service Info -->
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">مساج الاسترخاء</h3>
                    
                    <p class="text-gray-600 text-sm mb-4">جلسة مساج كاملة للاسترخاء والتخفيف من التوتر</p>

                    <!-- Duration -->
                    <div class="flex items-center gap-2 mb-4 text-sm text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        60 دقيقة
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex gap-1">
                            @for ($j = 0; $j < 5; $j++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">4.8 (42 تقييم)</span>
                    </div>

                    <!-- Professional Info -->
                    <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-200">
                        <img src="https://via.placeholder.com/32" alt="Pro" class="w-8 h-8 rounded-full">
                        <div>
                            <p class="text-sm font-medium text-gray-900">محمد علي</p>
                            <p class="text-xs text-gray-500">معالج متخصص</p>
                        </div>
                    </div>

                    <!-- Book Button -->
                    <button class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg font-medium transition-colors">
                        احجز الآن
                    </button>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <!-- Booking Modal -->
    <div id="bookingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h2 class="text-xl font-bold text-gray-900 mb-4">احجز الخدمة</h2>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">اختر التاريخ</label>
                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">اختر الوقت</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                        <option>09:00 ص</option>
                        <option>10:00 ص</option>
                        <option>11:00 ص</option>
                        <option>02:00 م</option>
                        <option>03:00 م</option>
                        <option>04:00 م</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ملاحظات (اختياري)</label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600" rows="3" placeholder="أي ملاحظات خاصة؟"></textarea>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">السعر:</span>
                        <span class="font-semibold text-gray-900">ر.س 150</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">الرسوم:</span>
                        <span class="font-semibold text-gray-900">ر.س 10</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 flex justify-between">
                        <span class="text-gray-900 font-bold">الإجمالي:</span>
                        <span class="text-teal-600 font-bold text-lg">ر.س 160</span>
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" class="flex-1 border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 rounded-lg transition-colors font-medium" onclick="document.getElementById('bookingModal').classList.add('hidden')">
                        إلغاء
                    </button>
                    <button type="submit" class="flex-1 bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg transition-colors font-medium">
                        تأكيد الحجز
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('button:not([type])').forEach(btn => {
    if (btn.textContent.includes('احجز الآن')) {
        btn.addEventListener('click', () => {
            document.getElementById('bookingModal').classList.remove('hidden');
        });
    }
});

document.getElementById('bookingModal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('bookingModal')) {
        document.getElementById('bookingModal').classList.add('hidden');
    }
});
</script>
@endsection
