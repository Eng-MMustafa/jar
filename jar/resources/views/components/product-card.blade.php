@props(['product'])

<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 flex flex-col h-full hover:border-teal-500 cursor-pointer">
    <!-- Image Section -->
    <div class="relative h-48 w-full bg-gray-50 overflow-hidden">
        @if($product->primary_image)
            <img src="{{ asset($product->primary_image->image_path) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <img src="{{ asset('images/placeholder-product.svg') }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover opacity-50">
        @endif

        <!-- Wishlist/Heart Button (Optional but common) -->
        {{-- <button class="absolute top-3 right-3 w-8 h-8 bg-white/95 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors shadow-sm">
            <i class="far fa-heart"></i>
        </button> --}}
    </div>

    <!-- Content Section -->
    <div class="p-4 text-right flex flex-col flex-grow" dir="rtl">
        <!-- Title & Rating -->
        <div class="flex justify-between items-start mb-2">
            <h3 class="font-bold text-lg text-gray-900 line-clamp-1 leading-tight group-hover:text-teal-600 transition-colors">
                {{ $product->name }}
            </h3>

            <!-- Rating Badge -->
            <div class="flex items-center gap-1 bg-gray-50 px-2 py-0.5 rounded-full">
                <span class="text-xs font-bold text-gray-800">{{ number_format($product->rating ?? 0, 1) }}</span>
                <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-500 text-sm mb-3 line-clamp-2 leading-relaxed h-10 overflow-hidden">
            {{ Str::limit($product->description, 80) }}
        </p>

        <!-- Location -->
        <div class="flex items-center justify-start gap-1.5 text-gray-400 text-xs mb-4 mt-auto">
            <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="truncate">{{ $product->city ?? 'الرياض' }}</span>
        </div>

        <!-- Footer: Price & Button -->
        <div class="flex items-center justify-between gap-2 pt-3 border-t border-gray-50">
            <!-- Price -->
            <div class="flex items-center gap-1">
                <span class="text-xl font-bold text-teal-600 font-sans">
                    {{ number_format($product->rental_price_daily ?? $product->price, 0) }}
                </span>
                <img src="{{ asset('images/Saudi_Riyal_Symbol 1.svg') }}" alt="SAR" class="w-4 h-4 object-contain">
                <span class="text-[10px] text-gray-400 font-medium">/ باليوم</span>
            </div>

            <!-- Book Button -->
            <a href="{{ route('products.show', $product->slug) }}" class="transform hover:scale-105 transition-transform duration-200">
                <img src="{{ asset('images/buttons (1).svg') }}" alt="احجز الآن" class="h-10 w-auto object-contain">
            </a>
        </div>
    </div>
</div>
