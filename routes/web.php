<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TroubleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/tentang', TentangController::class)->name('tentang');

Route::middleware(['auth', 'verified'])->get('/layanan', [PaketController::class, 'index'])->name('layanan');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/trouble', [TroubleController::class, 'index'])->name('trouble');
    Route::get('/trouble/create', [TroubleController::class, 'create'])->name('trouble.create');
    Route::post('/trouble', [TroubleController::class, 'store'])->name('trouble.store');
    Route::get('/trouble/{trouble}', [TroubleController::class, 'show'])->name('trouble.show');
});



Route::middleware('verified')->group(function () {
    Route::get('/paket-layanan/{paket}', [PaketController::class, 'show'])->name('paket.detail');
    
    Route::prefix('order')->group(function () {
        Route::get('{paket}/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('{paket}', [OrderController::class, 'store'])->name('order.store');
    });
});

// routes/web.php
Route::middleware(['auth', 'verified'])->get('/pesanan-saya', [PesananController::class, 'index'])->name('pesanan-saya');

Route::middleware(['auth', 'verified'])->get('/pesanan/{order}', [PesananController::class, 'show'])->name('pesanan.show');

Route::patch('/pesanan/{id}/cancel', [PesananController::class, 'cancel'])->name('pesanan.cancel');

Route::delete('/pesanan/{id}/delete', [PesananController::class, 'destroy'])->name('pesanan.delete');


Route::get('/payment/{order}', action: [PaymentController::class, 'process'])->name('payment.process');

Route::post('/payment/webhook', [PaymentController::class, 'webhook']);






Route::get('/kontak', [KontakController::class, 'showForm'])->name('kontak');

Route::post('/send-email', [KontakController::class, 'sendEmail'])->name('contact.send');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Route::get('/', function () {
    //     return view('home');
    // })->name('home');
});