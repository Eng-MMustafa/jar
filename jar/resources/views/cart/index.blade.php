@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">سلة التسوق</h1>

        @if(count($cartItems) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    @foreach($cartItems as $item)
                    <div class="bg-gray-50 rounded-lg p-6 mb-4">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item['product']->images->first()->image_path ?? 'https://via.placeholder.com/100x100' }}" alt="{{ $item['product']->name }}" class="w-20 h-20 object-cover rounded-md">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $item['product']->name }}</h3>
                                <p class="text-gray-600">{{ Str::limit($item['product']->description, 100) }}</p>
                                <div class="mt-2">
                                    <span class="text-sm text-gray-500">الكمية: {{ $item['quantity'] }}</span>
                                    <span class="text-sm text-gray-500 ml-4">الفترة: {{ ucfirst($item['rental_period']) }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-blue-600">${{ number_format($item['total'], 2) }}</p>
                                <form method="POST" action="{{ route('cart.remove', $item['product']->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">إزالة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">ملخص الطلب</h3>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span>المجموع الفرعي</span>
                            <span>${{ number_format(array_sum(array_column($cartItems, 'total')), 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>الضريبة</span>
                            <span>$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>الشحن</span>
                            <span>$0.00</span>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between text-lg font-bold">
                        <span>المجموع</span>
                        <span>${{ number_format(array_sum(array_column($cartItems, 'total')), 2) }}</span>
                    </div>
                    <a href="#" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 mt-6 inline-block text-center">المتابعة للدفع</a>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600 mb-4">سلة التسوق فارغة.</p>
                <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700">متابعة التسوق</a>
            </div>
        @endif
    </div>
</div>
@endsection