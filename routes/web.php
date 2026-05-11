<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/welcome', 'Welcome')->name('welcome');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/choose_category', 'chooseCategory')->name('products.choose_category');
    Route::get('/products/create', 'create')->name('products.create');
});
