<?php

use Illuminate\Support\Facades\Route;

// Main website routes (for regular users)
Route::get('/', function () {
    return 'Welcome to Rental Platform - Main Website';
});
