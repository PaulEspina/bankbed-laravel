<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Site\HomeController;
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

Route::get('login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'as'            => 'site.',
    'middleware'    => ['auth'],
], function() {
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
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
