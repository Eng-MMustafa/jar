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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

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
});
