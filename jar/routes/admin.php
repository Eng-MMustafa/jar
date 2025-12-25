<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaticContentController;

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Admin root redirect
    Route::get('/', function () {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    });
    
    // Guest routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.submit');
    });

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        
        // Logout
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Admin Users Management
        Route::resource('admins', AdminUserController::class);
        
        // Roles & Permissions
        Route::resource('roles', RoleController::class);
        
        // Users Management
        Route::resource('users', UserController::class);
        Route::post('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::post('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
        Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::delete('/users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.force-delete');
        
        // Categories Management
        Route::resource('categories', CategoryController::class);
        Route::post('/categories/{category}/enable', [CategoryController::class, 'enable'])->name('categories.enable');
        Route::post('/categories/{category}/disable', [CategoryController::class, 'disable'])->name('categories.disable');
        Route::post('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        
        // Products Management
        Route::resource('products', ProductController::class);
        Route::post('/products/{product}/activate', [ProductController::class, 'activate'])->name('products.activate');
        Route::post('/products/{product}/deactivate', [ProductController::class, 'deactivate'])->name('products.deactivate');
        Route::post('/products/{product}/feature', [ProductController::class, 'feature'])->name('products.feature');
        Route::post('/products/{product}/unfeature', [ProductController::class, 'unfeature'])->name('products.unfeature');
        Route::post('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::delete('/products/{product}/force-delete', [ProductController::class, 'forceDelete'])->name('products.force-delete');
        
        // Orders Management
        Route::resource('orders', OrderController::class);
        Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::post('/orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');
        
        // Support Tickets
        Route::resource('tickets', SupportTicketController::class);
        Route::post('/tickets/{ticket}/assign', [SupportTicketController::class, 'assign'])->name('tickets.assign');
        Route::post('/tickets/{ticket}/status', [SupportTicketController::class, 'updateStatus'])->name('tickets.update-status');
        Route::post('/tickets/{ticket}/reply', [SupportTicketController::class, 'reply'])->name('tickets.reply');
        
        // Sliders
        Route::resource('sliders', SliderController::class);
        Route::post('/sliders/{slider}/activate', [SliderController::class, 'activate'])->name('sliders.activate');
        Route::post('/sliders/{slider}/deactivate', [SliderController::class, 'deactivate'])->name('sliders.deactivate');
        Route::post('/sliders/{slider}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
        
        // Static Content
        Route::resource('content', StaticContentController::class);
        Route::post('/content/{content}/activate', [StaticContentController::class, 'activate'])->name('content.activate');
        Route::post('/content/{content}/deactivate', [StaticContentController::class, 'deactivate'])->name('content.deactivate');
        Route::post('/content/{content}/restore', [StaticContentController::class, 'restore'])->name('content.restore');
        
        // Reports & Analytics
        Route::get('/reports', function () {
            return view('admin.reports.index');
        })->name('reports.index');
        
        // Audit Logs
        Route::get('/audit-logs', function () {
            return view('admin.audit-logs.index');
        })->name('audit-logs.index');
        
        // Settings
        Route::get('/settings', function () {
            return view('admin.settings.index');
        })->name('settings.index');
    });
});
