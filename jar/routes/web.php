<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;

Auth::routes();

// Main website routes (for regular users)
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact page
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Route removed: categories index page deleted as requested
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Booking routes
Route::get('/bookings/completion', function () {
    return view('bookings.completion');
})->name('bookings.completion');

// Payment (bank transfer) pages for a booking
Route::get('/bookings/{booking}/payment', [App\Http\Controllers\BookingController::class, 'payment'])->name('bookings.payment');
Route::post('/bookings/{booking}/payment', [App\Http\Controllers\BookingController::class, 'submitPayment'])->name('bookings.payment.submit');
Route::get('/bookings/{booking}/payment/success', function (\App\Models\Booking $booking) {
    return view('bookings.payment-success', compact('booking'));
})->name('bookings.payment.success');

Route::get('/bookings/bank-details', function () {
    return view('bookings.bank-details');
})->name('bookings.bank-details');

// Products routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');


Auth::routes();

// Route '/home' kept for backward compatibility (not named) to avoid duplicating the 'home' route name
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Profile routes (protected by auth middleware)
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Renter activation
    Route::get('/profile/activate-renter', [ProfileController::class, 'activateRenter'])->name('profile.activate-renter');
    Route::post('/profile/activate-renter', [ProfileController::class, 'storeRenterActivation'])->name('profile.activate-renter.store');
    Route::get('/profile/activation-success', [ProfileController::class, 'activationSuccess'])->name('profile.activation-success');

    // Bookings and Support
    Route::get('/profile/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');
    Route::get('/profile/support-tickets', [ProfileController::class, 'supportTickets'])->name('profile.support-tickets');

    // Booking creation (simple flow)
    Route::get('/bookings/create', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');

    // Booking payment flow
    Route::get('/bookings/{booking}/payment', [App\Http\Controllers\BookingController::class, 'payment'])->name('bookings.payment');
    Route::post('/bookings/{booking}/payment', [App\Http\Controllers\BookingController::class, 'submitPayment'])->name('bookings.payment.submit');
    Route::get('/bookings/{booking}/payment/success', function () { return view('bookings.payment-success'); })->name('bookings.payment.success');

    // Owner approve/reject
    Route::post('/bookings/{booking}/approve', [App\Http\Controllers\BookingController::class, 'approve'])->name('bookings.approve');
    Route::post('/bookings/{booking}/reject', [App\Http\Controllers\BookingController::class, 'reject'])->name('bookings.reject');

    // My Products Management routes
    Route::get('/products-me', [ProfileController::class, 'myProducts'])->name('my-products.index');
    Route::get('/products-me/create', [ProfileController::class, 'createProduct'])->name('my-products.create');
    Route::post('/products-me', [ProfileController::class, 'storeProduct'])->name('my-products.store');
    Route::get('/products-me/{id}/edit', [ProfileController::class, 'editProduct'])->name('my-products.edit');
    Route::put('/products-me/{id}', [ProfileController::class, 'updateProduct'])->name('my-products.update');
    Route::delete('/products-me/{id}', [ProfileController::class, 'deleteProduct'])->name('my-products.delete');

    // Favorites (requires auth)
    Route::post('/products/{product}/favorite', [ProductController::class, 'toggleFavorite'])->name('products.favorite');

    // Product comments (requires auth)
    Route::post('/products/{product}/comments', [App\Http\Controllers\ProductCommentController::class, 'store'])->name('products.comments.store');

    Route::get('/chat', [ProfileController::class, 'chat'])->name('chat');
    Route::get('/massage', [ProfileController::class, 'massage'])->name('massage');
    Route::get('/my-orders', [ProfileController::class, 'myOrders'])->name('my-orders');
    Route::get('/new-rental-orders', [ProfileController::class, 'newRentalOrders'])->name('new-rental-orders');
    Route::get('/notifications', [ProfileController::class, 'notifications'])->name('notifications');
});

// Admin Routes (with layout)
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication Routes
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Categories Management
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::post('categories/{category}/toggle', [App\Http\Controllers\Admin\CategoryController::class, 'toggleStatus'])->name('categories.toggle');

        // Products Management
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::post('products/{product}/toggle', [App\Http\Controllers\Admin\ProductController::class, 'toggleStatus'])->name('products.toggle');

        // Orders Management
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
        Route::post('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');

        // Users Management
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::post('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('users.toggle');

        // Admins Management
        Route::resource('admins', App\Http\Controllers\Admin\AdminUserController::class);

        // Roles & Permissions
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);

        // Sliders Management
        Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
        Route::post('sliders/{slider}/toggle', [App\Http\Controllers\Admin\SliderController::class, 'toggleStatus'])->name('sliders.toggle');

        // Support Tickets
        Route::resource('tickets', App\Http\Controllers\Admin\SupportTicketController::class);
        Route::post('tickets/{ticket}/reply', [App\Http\Controllers\Admin\SupportTicketController::class, 'reply'])->name('tickets.reply');
        Route::post('tickets/{ticket}/close', [App\Http\Controllers\Admin\SupportTicketController::class, 'close'])->name('tickets.close');

        // Content Pages
        Route::resource('content', App\Http\Controllers\Admin\StaticContentController::class);

        // Reports & Audit Logs
        Route::get('reports', function() { return view('admin.reports.index'); })->name('reports.index');
        Route::get('audit-logs', function() { return view('admin.audit-logs.index'); })->name('audit-logs.index');
        Route::get('settings', function() { return view('admin.settings.index'); })->name('settings.index');
    });
});

// Fix Storage Link Route
Route::get('/fix-storage', function () {
    try {
        $target = storage_path('app/public');
        $link = public_path('storage');

        if (file_exists($link)) {
            // Check if it's a directory (and not a link)
            if (is_dir($link) && !is_link($link)) {
                // Recursively delete the directory
                \Illuminate\Support\Facades\File::deleteDirectory($link);
            } else {
                // It's a file or a link
                unlink($link);
            }
        }

        // Try to create the symlink
        symlink($target, $link);

        return 'Storage link fixed successfully! <br> Target: ' . $target . '<br> Link: ' . $link;
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

// Clear Cache Route
Route::get('/clear-cache', function () {
    try {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
        Artisan::call('route:clear');
        return 'Application cache cleared! (cache, view, route, config, optimize)';
    } catch (\Exception $e) {
        return 'Error clearing cache: ' . $e->getMessage();
    }
});

// Fix Sessions Route
Route::get('/fix-sessions', function () {
    try {
        $path = storage_path('framework/sessions');

        // Check if directory exists
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Try to set permissions
        chmod($path, 0755);

        // Clean up old session files (files older than 30 days)
        $files = glob($path . '/*');
        $count = 0;
        $now = time();

        foreach ($files as $file) {
            if (is_file($file) && basename($file) !== '.gitignore') {
                if ($now - filemtime($file) > 30 * 24 * 60 * 60) { // 30 days
                    unlink($file);
                    $count++;
                }
            }
        }

        return "Sessions directory fixed! Permissions set to 0755. Cleaned $count old session files.";
    } catch (\Exception $e) {
        return 'Error fixing sessions: ' . $e->getMessage();
    }
});
