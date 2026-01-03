@extends('layouts.app')

@section('content')

<!-- من نحن Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Image -->
            <div class="order-1 lg:order-2">
                <img src="{{ asset('images/Images/Image_513xwd513xwd513x 1.png') }}" alt="من نحن" class="rounded-xl shadow-lg w-full h-96 object-cover">
            </div>

            <!-- Right: Content -->
            <div class="order-2 lg:order-1">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">من نحن</h1>
                <p class="text-gray-700 text-base leading-relaxed mb-4">
                    نحن منصة متخصصة في تأجير الممتلكات والمعدات، حيث نربط بين الملاك والمستأجرين عبر منصة آمنة وموثوقة. نوفر مجموعة واسعة من الخدمات والمنتجات بأسعار منافسة وجودة عالية.
                </p>
                <p class="text-gray-700 text-base leading-relaxed mb-8">
                    بدأنا رحلتنا برؤية واضحة - جعل التأجير أسهل وأكثر أماناً في المملكة العربية السعودية. اليوم، نفخر بأننا خدمنا آلاف العملاء الراضين عن خدماتنا.
                </p>
                <button class="bg-teal-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-700 transition">
                    انضم للمنصة الآن
                </button>
            </div>
        </div>
    </div>
</section>

<!-- رؤيتنا Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-cyan-50 rounded-xl p-8">
            <div class="flex items-center gap-3 mb-4 flex-row-reverse">
                <h2 class="text-2xl font-bold text-teal-600">رؤيتنا</h2>
                <span class="text-4xl">🎯</span>
            </div>
            <p class="text-gray-700 text-base leading-relaxed text-right">
                أن تكون المنصة السعودية الأولى التي تجمع الأفراد وأصحاب الأعمال لتأجير ومشاركة الممتلكات والمعدات بسهولة وأمان.
            </p>
        </div>
    </div>
</section>

<!-- رسالتنا Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-green-50 rounded-xl p-8">
            <div class="flex items-center gap-3 mb-4 flex-row-reverse">
                <h2 class="text-2xl font-bold text-green-600">رسالتنا</h2>
                <span class="text-4xl">📋</span>
            </div>
            <p class="text-gray-700 text-base leading-relaxed text-right">
                تمكين المستخدمين من عرض وتأجير ممتلكاتهم المختلفة عبر منصة موثوقة وسهلة الاستخدام، وتسهيل عملية التأجير بين الأطراف من خلال تجربة آمنة وشاملة مع موافقتة مع أنظمة المملكة العربية السعودية.
            </p>
        </div>
    </div>
</section>

<!-- قريب منك Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">قريب منك</h2>
            <p class="text-gray-600 text-sm">استعرض منتجات ممتازة في منطقتك القصيم</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden">
                <div class="bg-gray-200 h-48 flex items-center justify-center overflow-hidden relative group">
                    <img src="{{ asset('images/Images/Frame 29.png') }}" alt="خيمة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-1 mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700">4.5</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">خيمة للمخيم البدوي</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <span class="text-teal-700 font-bold">90 ريال</span>
                        <button class="bg-teal-600 text-white px-3 py-2 rounded-lg font-semibold hover:bg-teal-700 transition text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H2a.5.5 0 00-.5.5v16a.5.5 0 00.5.5h16a.5.5 0 00.5-.5v-10"/>
                            </svg>
                            أضف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden">
                <div class="bg-gray-200 h-48 flex items-center justify-center overflow-hidden relative group">
                    <img src="{{ asset('images/Images/Image.png') }}" alt="أغطية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-1 mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700">4.3</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">أغطية بحري</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <span class="text-teal-700 font-bold">80 ريال</span>
                        <button class="bg-teal-600 text-white px-3 py-2 rounded-lg font-semibold hover:bg-teal-700 transition text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H2a.5.5 0 00-.5.5v16a.5.5 0 00.5.5h16a.5.5 0 00.5-.5v-10"/>
                            </svg>
                            أضف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden">
                <div class="bg-gray-200 h-48 flex items-center justify-center overflow-hidden relative group">
                    <img src="{{ asset('images/Images/Image-4.png') }}" alt="حقيبة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">بريدة</span>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-1 mb-2">
                        <span class="text-yellow-400">★</span>
                        <span class="text-sm text-gray-700">4.2</span>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm mb-1 line-clamp-2">حقيبة للرحلات والمخيم</h3>
                    <p class="text-gray-500 text-xs mb-3">بريدة</p>
                    <div class="flex items-center justify-between">
                        <span class="text-teal-700 font-bold">30 ريال</span>
                        <button class="bg-teal-600 text-white px-3 py-2 rounded-lg font-semibold hover:bg-teal-700 transition text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H2a.5.5 0 00-.5.5v16a.5.5 0 00.5.5h16a.5.5 0 00.5-.5v-10"/>
                            </svg>
                            أضف
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="#" class="text-teal-600 font-semibold hover:text-teal-700">عرض الكل ←</a>
        </div>
    </div>
</section>

@endsection
