<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resources([
    'account' => '\App\Http\Controllers\AccountController',
    'category' => '\App\Http\Controllers\CategoryController',
    'coin' => '\App\Http\Controllers\CoinController',
    'sharedAccount' => '\App\Http\Controllers\SharedAccountController',
    'transaction' => '\App\Http\Controllers\TransactionController',
    'transactionType' => '\App\Http\Controllers\TransactionTypeController',
    'transfer' => '\App\Http\Controllers\TransferController',

    ]);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
