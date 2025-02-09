<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('home');
})->name('home');


// Campaign routes 
Route::get('/create-campaign', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('/create-campaign', [CampaignController::class, 'store'])->name('campaigns.store');


// Auth routes
Route::get('/register' ,[AuthController::class , 'showRegister'])->name('show.register');
Route::get('/login' ,[AuthController::class , 'showLogin'])->name('show.login');
