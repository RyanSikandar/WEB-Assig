<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthenticateRedirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;


Route::get('/', [HomeController::class, 'index']);

Route::post('/register', [HomeController::class, 'register']);
Route::post('/login', [HomeController::class, 'login']);
Route::post('/logout', [HomeController::class, 'logout']);


Route::get('/about', function () {
    return view('about');
})->middleware(AuthenticateRedirect::class);


    Route::get('/services', [ProductController::class, 'index'])->middleware(AuthenticateRedirect::class);
    Route::post('/add-service', [ProductController::class, 'store']);
    Route::post('/remove-service', [ProductController::class, 'delete']);
    Route::post('/update-service', [ProductController::class, 'update']);

// Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::post('/services/add-to-cart', [ServicesController::class, 'addToCart'])->name('services.addToCart');
Route::get('/services/{id}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/cart', [ServicesController::class, 'viewCart'])->name('cart.view');
Route::post('/checkout', [ServicesController::class, 'checkout'])->name('cart.checkout');
