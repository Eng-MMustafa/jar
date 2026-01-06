<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $productId = $request->query('product');
        $product = Product::with('images')->findOrFail($productId);

        return view('bookings.create', compact('product'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $quantity = $validated['quantity'] ?? 1;
        $start = \Carbon\Carbon::parse($validated['start_date']);
        $end = \Carbon\Carbon::parse($validated['end_date']);

        $nights = max(1, $start->diffInDays($end));

        $pricePerNight = $product->rental_price_daily ?? $product->price ?? 0;
        $deposit = $product->security_deposit ?? 0;

        $total = ($nights * $pricePerNight * $quantity) + ($deposit * $quantity);

        $booking = \App\Models\Booking::create([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
            'start_date' => $start->toDateString(),
            'end_date' => $end->toDateString(),
            'quantity' => $quantity,
            'nights' => $nights,
            'price_per_night' => $pricePerNight,
            'security_deposit' => $deposit,
            'total' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.completion')->with('success', 'تم إنشاء الحجز بنجاح')->with('booking_id', $booking->id);
    }
}
