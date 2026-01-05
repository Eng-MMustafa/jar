<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Product;

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
     * Show my products list
     */
    public function myProducts()
    {
        $products = auth()->user()->products()->latest()->paginate(12);
        return view('pages.products-me-list', compact('products'));
    }

    /**
     * Show add product page
     */
    public function createProduct()
    {
        return view('pages.products-me-create');
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

        return redirect()->route('my-products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    /**
     * Show edit product page
     */
    public function editProduct($id)
    {
        // Allow a demo edit page for testing (id = 0)
        if ((int)$id === 0) {
            $product = new Product([
                'name' => 'منتج تجريبي',
                'description' => 'هذا وصف تجريبي لعرض النموذج واختبار زر التعديل.',
                'category_id' => 1,
                'price' => 120,
                'original_price' => 150,
                'city' => 'الرياض',
                'is_active' => true,
            ]);
            $product->id = 0; // mark as demo
            return view('pages.products-me-edit', compact('product'));
        }

        $product = auth()->user()->products()->findOrFail($id);
        return view('pages.products-me-edit', compact('product'));
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, $id)
    {
        // If demo product (id = 0), validate input and simulate success so the form can be tested
        if ((int)$id === 0) {
            $request->validate([
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
            return redirect()->route('my-products.index')->with('success', 'تم (تجريبياً) تحديث المنتج بنجاح');
        }

        $product = auth()->user()->products()->findOrFail($id);

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

        // Handle images (append new images)
        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $image) {
                $paths[] = $image->store('products', 'public');
            }
            // You may want to save these to related ProductImage model
            // For now, just keep a JSON column or ignore if not implemented
            $validated['images'] = $paths;
        }

        $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'city' => $validated['city'],
            'is_active' => $validated['status'] === 'active',
        
        ]);

        return redirect()->route('my-products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    /**
     * Delete product
     */
    public function deleteProduct($id)
    {
        // If demo product (id = 0) do not attempt delete; just redirect with message
        if ((int)$id === 0) {
            return redirect()->route('my-products.index')->with('success', 'هذا منتج تجريبي ولا يمكن حذفه');
        }

        $product = auth()->user()->products()->findOrFail($id);
        $product->delete();

        return redirect()->route('my-products.index')->with('success', 'تم حذف المنتج بنجاح');
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
    }}