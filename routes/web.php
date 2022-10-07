<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Models\ProductGallery;
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

require __DIR__ . '/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/product/{id}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');
    Route::resource('/products', ProductController::class);

    Route::resource('/product-galleries', ProductGalleryController::class);

    Route::get('/transactions/{id}/set-status', [TransactionController::class, 'status'])->name('transactions.status');
    Route::resource('/transactions', TransactionController::class);
});
