<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user profile
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show edit profile form
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);

        auth()->user()->update($validated);

        return redirect()->route('profile.index')->with('success', 'تم تحديث البيانات الشخصية بنجاح');
    }

    /**
     * Show activate renter form
     */
    public function activateRenter()
    {
        return view('profile.activate-renter');
    }

    /**
     * Store renter activation request
     */
    public function storeRenterActivation(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'business_description' => 'required|string|max:1000',
            'hand_photo' => 'nullable|image|max:5000',
            'bank_account_name' => 'required|string|max:255',
            'bank_iban' => 'required|string|max:34',
            'bank_account_number' => 'required|string|max:20',
        ]);

        // Handle file upload
        if ($request->hasFile('hand_photo')) {
            $path = $request->file('hand_photo')->store('renter-photos', 'public');
            $validated['hand_photo'] = $path;
        }

        // Save to database (you might create a new table or use JSON column)
        auth()->user()->update([
            'type' => 'lender',
            'business_name' => $validated['business_name'],
            'city' => $validated['city'],
            'business_description' => $validated['business_description'],
            'hand_photo' => $validated['hand_photo'] ?? null,
            'bank_account_name' => $validated['bank_account_name'],
            'bank_iban' => $validated['bank_iban'],
            'bank_account_number' => $validated['bank_account_number'],
        ]);

        return redirect()->route('profile.activation-success')->with('success', 'تم إرسال طلب التفعيل بنجاح');
    }

    /**
     * Show activation success page
     */
    public function activationSuccess()
    {
        return view('profile.activation-success');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile.index')->with('success', 'تم تحديث كلمة المرور بنجاح');
    }

    /**
     * Show user bookings
     */
    public function bookings()
    {
        $bookings = auth()->user()->orders()->latest()->paginate(10);
        return view('profile.bookings', compact('bookings'));
    }

    /**
     * Show support tickets
     */
    public function supportTickets()
    {
        $tickets = auth()->user()->supportTickets()->latest()->paginate(10);
        return view('profile.support-tickets', compact('tickets'));
    }

    /**
     * Show products page
     */
    public function products()
    {
        return view('pages.products');
    }

    /**
     * Show add product page
     */
    public function createProduct()
    {
        return view('pages.products-create');
    }

    /**
     * Store new product
     */
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'city' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'images' => 'nullable|array',
            'images.*' => 'image|max:5000',
        ]);

        // Handle images
        if ($request->hasFile('images')) {
            $validated['images'] = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $validated['images'][] = $path;
            }
        }

        // Save product (implement with your Product model)
        // Product::create(array_merge($validated, ['user_id' => auth()->id()]));

        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    /**
     * Show chat page
     */
    public function chat()
    {
        return view('pages.chat');
    }

    /**
     * Show massage services page
     */
    public function massage()
    {
        return view('pages.massage');
    }

    /**
     * Show my orders page
     */
    public function myOrders()
    {
        return view('pages.my-orders');
    }

    /**
     * Show new rental orders page (for lenders)
     */
    public function newRentalOrders()
    {
        return view('pages.new-rental-orders');
    }

    /**
     * Show notifications page
     */
    public function notifications()
    {
        return view('pages.notifications');
    }
}
