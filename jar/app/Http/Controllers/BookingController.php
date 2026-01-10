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
            'transfer_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $quantity = $validated['quantity'] ?? 1;
        $start = \Carbon\Carbon::parse($validated['start_date']);
        $end = \Carbon\Carbon::parse($validated['end_date']);

        $nights = max(1, $start->diffInDays($end));

        $pricePerNight = $product->rental_price_daily ?? $product->price ?? 0;
        $deposit = $product->security_deposit ?? 0;

        $total = ($nights * $pricePerNight * $quantity) + ($deposit * $quantity);

        $transferProofPath = null;
        if ($request->hasFile('transfer_proof')) {
            $file = $request->file('transfer_proof');
            $transferProofPath = $file->store('bookings/transfers', 'public');
        }

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
            'status' => 'pending', // Set directly to pending as receipt is provided
            'transfer_proof_path' => $transferProofPath,
            'transfer_status' => 'submitted',
            'transfer_submitted_at' => now(),
        ]);

        return redirect()->route('profile.bookings')->with('success', 'تم إرسال طلب الحجز والإيصال بنجاح. بانتظار الموافقة.');
    }

    // Show payment (bank transfer) page for a booking
    public function payment(\Illuminate\Http\Request $request, \App\Models\Booking $booking)
    {


        $product = $booking->product()->with('images')->first();

        return view('bookings.payment', compact('booking', 'product'));
    }

    // Handle transfer upload
    public function submitPayment(Request $request, \App\Models\Booking $booking)
    {
        if ($booking->user_id !== $request->user()->id) {
            return redirect()->route('profile.bookings')->with('error', 'هذا الحجز غير متاح لك.');
        }

        $validated = $request->validate([
            'transfer_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'transfer_note' => 'nullable|string|max:2000',
        ]);

        if ($request->hasFile('transfer_proof')) {
            $file = $request->file('transfer_proof');
            $path = $file->store('bookings/transfers', 'public');

            $booking->update([
                'transfer_proof_path' => $path,
                'transfer_status' => 'submitted',
                'status' => 'pending',
                'transfer_submitted_at' => now(),
                'transfer_note' => $validated['transfer_note'] ?? null,
            ]);
        }

        // notify admin or lender here if needed

        return redirect()->route('bookings.payment.success', ['booking' => $booking->id]);
    }

    // Owner approves booking
    public function approve(Request $request, \App\Models\Booking $booking)
    {


        if (!$booking->product) {
            return redirect()->back()->with('error', 'المنتج غير موجود');
        }

        // Use loose comparison or cast to int to avoid type mismatch
        if ((int)$booking->product->user_id !== (int)$request->user()->id) {
            return redirect()->back()->with('error', 'غير مسموح');
        }

        $booking->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'تمت الموافقة على الطلب');
    }

    public function reject(Request $request, \App\Models\Booking $booking)
    {
          if (!$booking->product) {
            return redirect()->back()->with('error', 'المنتج غير موجود');
        }

        // Use loose comparison or cast to int to avoid type mismatch
        if ((int)$booking->product->user_id !== (int)$request->user()->id) {
            return redirect()->back()->with('error', 'غير مسموح');
        }

        $booking->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'تم رفض الطلب');
    }
}
