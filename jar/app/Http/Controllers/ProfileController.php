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
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('avatars', 'public'); // e.g. avatars/xxx.jpg
            $publicPath = 'storage/' . $path; // we'll store with storage/ prefix so asset() works

            // remove old avatar file (if previously uploaded and stored under storage/)
            $old = auth()->user()->avatar;
            if ($old && str_starts_with($old, 'storage/')) {
                // delete the file from public disk
                try {
                    $oldRelative = substr($old, strlen('storage/'));
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldRelative);
                } catch (\Throwable $e) {
                    // ignore deletion errors
                }
            }

            $validated['avatar'] = $publicPath;
        }

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
        // show actual bookings made by the user
        $bookings = auth()->user()->bookings()->with(['product.images'])->latest()->paginate(10);
        return view('profile.bookings', compact('bookings'));
    }

    /**
     * Show support tickets
     */
    public function supportTickets()
    {
        // Show rental requests for products owned by the user (reuse bookings)
        $bookings = \App\Models\Booking::with(['product', 'user'])
            ->whereHas('product', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('profile.support-tickets', compact('bookings'));
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
            'security_deposit' => 'nullable|numeric|min:0',
            'rental_type' => 'nullable|in:daily,hourly',
            'city' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|max:5000',
            'images' => 'nullable|array',
            'images.*' => 'image|max:5000',
        ]);

        // Prepare product data
        $productData = [
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'city' => $validated['city'],
            'is_active' => $validated['status'] === 'active',
            'security_deposit' => $validated['security_deposit'] ?? null,
            'rental_type' => $validated['rental_type'] ?? null,
        ];

        // Generate slug and SKU to satisfy DB constraints
        $slugBase = \Illuminate\Support\Str::slug($validated['name']);
        $slug = $slugBase;
        $i = 1;
        while (\App\Models\Product::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $i++;
        }
        $productData['slug'] = $slug;
        $productData['sku'] = 'SKU' . strtoupper(\Illuminate\Support\Str::random(8));

        // Set rental price field according to rental_type (if any)
        if (!empty($validated['rental_type']) && $validated['rental_type'] === 'daily') {
            $productData['rental_price_daily'] = $validated['price'];
            $productData['is_rentable'] = true;
        } elseif (!empty($validated['rental_type']) && $validated['rental_type'] === 'hourly') {
            $productData['rental_price_hourly'] = $validated['price'];
            $productData['is_rentable'] = true;
        }

        $product = Product::create($productData);

        // Handle main image
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $product->images()->create([
                'image_path' => 'storage/' . $path,
                'is_primary' => true,
            ]);
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => 'storage/' . $path,
                    'is_primary' => false,
                ]);
            }
        }

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
                'security_deposit' => 150,
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
                'security_deposit' => 'nullable|numeric|min:0',
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
            'security_deposit' => 'nullable|numeric|min:0',
            'rental_type' => 'nullable|in:daily,hourly',
            'city' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|max:5000',
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
            'security_deposit' => $validated['security_deposit'] ?? null,
            'rental_type' => $validated['rental_type'] ?? null,
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
        // Bookings for products owned by the current user
        $bookings = \App\Models\Booking::with(['product', 'user'])
            ->whereHas('product', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.new-rental-orders', compact('bookings'));
    }

    /**
     * Show notifications page
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Delete user account
     */
    public function destroy(Request $request)
    {
        $user = auth()->user();

        // log the user out first
        auth()->logout();

        // delete the user
        $user->delete();

        // invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'تم حذف الحساب بنجاح');
    }}