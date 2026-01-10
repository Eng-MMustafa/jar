@extends('layouts.app')

@section('content')

<!-- Main Section -->
<section class="py-16 bg-gray-50" dir="rtl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-screen">

            <!-- Right side: Content sections -->
            <div class="space-y-8 order-1">

                <!-- من نحن Section -->
                <div class="text-right">
                    <h1 class="text-4xl font-bold text-teal-600 mb-6 text-right">من نحن</h1>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8 text-right">
                        نحن منصة سعودية متخصصة في تأجير الممتلكات والمعدات، مثل الأثاث وأغراض التخييم
                        وغيرها من الخدمات الهاديفة. نهدف إلى التخييم تجربة تأجير سهلة وموثوقة من خلال إجراءات
                        واضحة، جودة عالية، وأسعار شفافة. مع الإلتزام بالأنظمة المعتمدة في المملكة العربية
                        السعودية لتلبية احتياجات الأفراد.
                    </p>
                    <button class="bg-teal-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-teal-700 transition text-lg">
                        انضم للمنصة الآن
                    </button>
                </div>

                <!-- رؤيتنا Section -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-end gap-4 mb-4">
                        <h2 class="text-2xl font-bold text-teal-600">رؤيتنا</h2>
                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed text-right">
                        أن تكون المنصة السعودية الأولى التي تجمع الأفراد وأصحاب الأعمال لتأجير ومشاركة الممتلكات والمعدات بسهولة وأمان.
                    </p>
                </div>

                <!-- رسالتنا Section -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-end gap-4 mb-4">
                        <h2 class="text-2xl font-bold text-teal-600">رسالتنا</h2>
                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed text-right">
                        تمكين المستخدمين من عرض وتأجير ممتلكاتهم المختلفة عبر منصة موثوقة وسهلة الاستخدام، وتسهيل عملية التأجير بين الأطراف من خلال تجربة آمنة وشاملة، متوافقة مع أنظمة المملكة العربية السعودية.
                    </p>
                </div>

            </div>

            <!-- Left side: Image and icons -->
            <div class="flex flex-col items-center justify-center relative order-2">
                <!-- Background decorative icons -->
                <div class="absolute top-10 left-10">
                    <img src="{{ asset('images/images/Frame 29.png') }}" alt="خيمة" class="w-16 h-16 object-cover rounded-lg opacity-30">
                </div>
                <div class="absolute top-20 right-20">
                    <img src="{{ asset('images/images/Image.png') }}" alt="معدات" class="w-12 h-12 object-cover rounded-lg opacity-30">
                </div>
                <div class="absolute bottom-32 left-20">
                    <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </div>

                <!-- Main person image -->
                <div class="relative z-10">
                    <img src="{{ asset('images/images/Image_513xwd513xwd513x 1.png') }}" alt="شخص مع لابتوب" class="w-80 h-80 object-cover rounded-full">
                    <!-- Speech bubble -->
                    <div class="absolute -top-5 -right-10 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-semibold">
                        تم جاهز...
                    </div>
                </div>
            </div>
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
                    <img src="{{ asset('images/images/Frame 29.png') }}" alt="خيمة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
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
                    <img src="{{ asset('images/images/Image.png') }}" alt="أغطية" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
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
                    <img src="{{ asset('images/images/Image-4.png') }}" alt="حقيبة" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
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
                                <path d="M10.5 1.5H2a.5.5 0 00-.5.5v16a.5.5 0 00.5-.5v-10"/>
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
