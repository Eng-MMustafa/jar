<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

Auth::routes();

// Main website routes (for regular users)
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Booking routes
Route::get('/bookings/completion', function () {
    return view('bookings.completion');
})->name('bookings.completion');

Route::get('/bookings/bank-details', function () {
    return view('bookings.bank-details');
})->name('bookings.bank-details');

// Products routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
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

    // My Products Management routes
    Route::get('/products-me', [ProfileController::class, 'myProducts'])->name('my-products.index');
    Route::get('/products-me/create', [ProfileController::class, 'createProduct'])->name('my-products.create');
    Route::post('/products-me', [ProfileController::class, 'storeProduct'])->name('my-products.store');
    Route::get('/products-me/{id}/edit', [ProfileController::class, 'editProduct'])->name('my-products.edit');
    Route::put('/products-me/{id}', [ProfileController::class, 'updateProduct'])->name('my-products.update');
    Route::delete('/products-me/{id}', [ProfileController::class, 'deleteProduct'])->name('my-products.delete');
    
    Route::get('/chat', [ProfileController::class, 'chat'])->name('chat');
    Route::get('/massage', [ProfileController::class, 'massage'])->name('massage');
    Route::get('/my-orders', [ProfileController::class, 'myOrders'])->name('my-orders');
    Route::get('/new-rental-orders', [ProfileController::class, 'newRentalOrders'])->name('new-rental-orders');
    Route::get('/notifications', [ProfileController::class, 'notifications'])->name('notifications');
});
