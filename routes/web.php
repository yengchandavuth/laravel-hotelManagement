<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\BookingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index'])->name('home');

// Rooms routes
// List all rooms
Route::get('/rooms', [PageController::class, 'list_rooms'])->name('rooms.index');

// Search rooms
Route::post('/rooms', [PageController::class, 'search'])->name('search');

// Show room details or booking
Route::get('/rooms/{room}', [PageController::class, 'show'])->name('rooms.show');

// Profile routes
Route::get('/profile', [PageController::class, 'showProfile'])->name('profile');
Route::put('/profile', [PageController::class, 'updateProfile']);

// Orders routes
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// User booking routes
Route::middleware('auth')->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');
});



/************************************
 *              Auth
 ************************************/
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');

    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');

    Route::post('logout', 'logout')->name('logout');
});

Route::post('/orders/store', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('orders.store');


/************************************
 *              Admin
 ************************************/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
// Admin dashboard
Route::get('/', [AdminController::class, 'index'])->name('index');

// Room Types
Route::resource('roomtypes', RoomTypeController::class);

// Rooms (except show)
Route::resource('rooms', RoomController::class)->except('show');

// Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

});



