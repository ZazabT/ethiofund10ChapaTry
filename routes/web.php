<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapaPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// campaign
Route::get('/', [CampaignController::class, 'index'])->name('home');
Route::get('/campaign/{id}', [CampaignController::class, 'show'])->name('campaign.show');





// Protect Campaign and pay routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/create-campaign', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('/create-campaign', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::post('/donate', [ChapaPaymentController::class, 'donate'])->name('donate');
    Route::get('/payment/callback/{transactionId}', [ChapaPaymentController::class, 'callback'])->name('payment.callback');
    Route::get('/payment/redirect', [ChapaPaymentController::class, 'redirect'])->name('payment.redirect');

});




// Auth routes
Route::get('/register' ,[AuthController::class , 'showRegister'])->name('show.register');
Route::post('/register' ,[AuthController::class , 'register'])->name('register');
Route::post('/login' ,[AuthController::class , 'login'])->name('login');
Route::post('/logout' ,[AuthController::class , 'logout'])->name('logout');
Route::get('/login' ,[AuthController::class , 'showLogin'])->name('show.login');
