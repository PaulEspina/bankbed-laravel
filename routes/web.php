<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BankAccountController;
use App\Http\Controllers\Dashboard\TransactionController;

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

Route::get('register', [AuthController::class, 'showRegister'])->name('show-register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'showLogin'])->name('show-login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'as'            => 'site.',
    'middleware'    => ['auth'],
], function() {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('profile', [SiteController::class, 'profile'])->name('profile');
    Route::get('withdraw', [SiteController::class, 'withdraw'])->name('withdraw');
    Route::post('withdraw/submit', [SiteController::class, 'submitWithdraw'])->name('withdraw.submit');
    Route::get('deposit', [SiteController::class, 'deposit'])->name('deposit');
    Route::post('deposit/submit', [SiteController::class, 'submitDeposit'])->name('deposit.submit');
    Route::get('transfer', [SiteController::class, 'transfer'])->name('transfer');
    Route::post('transfer/submit', [SiteController::class, 'submitTransfer'])->name('transfer.submit');
});

Route::group([
    'as'            => 'dashboard.',
    'prefix'        => '/dashboard',
    'middleware'    => ['auth'],
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
    Route::resource('bank-accounts', BankAccountController::class);
    Route::resource('transactions', TransactionController::class);
});
