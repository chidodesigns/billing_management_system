<?php

use Admin\UserController;
use Admin\ClientController;
use Admin\ClientPaymentProfileController;
use User\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//  User Related Pages
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::get('profile', Profile::class)->name('profile');
});


//  Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function (){
    //  Billing System Users
    Route::resource('/users', UserController::class);
    //  Billing System Clients 
    Route::resource('/clients', ClientController::class);
    //  Billing System Client Payment Profiles
    Route::resource('/client-payments', ClientPaymentProfileController::class);
});

