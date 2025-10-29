<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;

// Public Routes
Route::get('/', [MainController::class, 'index']);
Route::get('/shop', [MainController::class, 'shop']);
Route::get('/contact', [MainController::class, 'contact']);
Route::get('/about-us', [MainController::class, 'about']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/view-cart', [CartController::class, 'viewCart']);
Route::get('/view-cart/{id}', [CartController::class, 'viewCart']);
Route::post('/add-cart/{id}', [CartController::class, 'addToCart']);
Route::get('/remove-cart/{id}', [CartController::class, 'removeFromCart']);
Route::get('/checkout',[CartController::class,'checkout']);
Route::get('/searchresults',[MainController::class,'searchresults']);

Route::get('/view-users', [AuthController::class, 'viewUsers']);
Route::post('/edit-user/{id}', [AuthController::class, 'editUser']);




// Admin Routes (Requires authentication and admin check)
Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard']);
    Route::get('/view-product', [MainController::class, 'viewProduct']);
    Route::get('/add-product', [MainController::class, 'addProduct']);
    Route::get('/view-order', [CartController::class, 'viewOrder']);

    Route::post('/store-product', [CrudController::class, 'storeProduct']);
    Route::post('/edit-product/{id}', [CrudController::class, 'updateProduct']);
    Route::post('/delete/{id}', [CrudController::class, 'delete']);
    Route::post('/delete-order/{id}', [cartController::class, 'deleteOrder']);
});

// Auth Routes for Login and Register (Accessible only by guests)

    Route::post('/login-user', [AuthController::class, 'loginUser']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register-user', [AuthController::class, 'registerUser']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/details/{id}',[MainController::class,'details']);
    Route::get('/forgot-password', [AuthController::class, 'forgot']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);



// messaging 
Route::get('/inbox', [MessageController::class, 'inbox'])->name('placeOrder');
Route::post('/place-order', [cartController::class, 'placeOrder'])->name('placeOrder');
Route::get('/read-message/{id}', [MessageController::class, 'readMessage'])->name('readMessage');
Route::post('/message-store', [MessageController::class, 'storeMessage'])->name('messages.store');
Route::get('/messages/mark-as-read/{id}', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
Route::get('/deletemessage/{id}',[MessageController::class,'deletemessage'])->name('deletemessage');
Route::get('/pay',[CartController::class,'pay'])->name('client.pages.pay');
Route::post('/process-payment/{orderId}', [CartController::class, 'processStripePayment'])->name('processPayment');




    

