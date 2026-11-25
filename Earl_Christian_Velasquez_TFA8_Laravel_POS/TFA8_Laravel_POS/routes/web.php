<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome')->name('home');
Route::middleware('auth')->group(function () {
 Route::resource('customers', CustomerController::class);
 Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
