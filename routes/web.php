<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\User\CheckoutController;
 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::prefix('admin')->middleware(['auth', 'usertype:admin'])->group(function () {
    Route::resource('databarang', BarangController::class);
    Route::get('dashboard', [HomeController::class, 'adminDashboard']);
     Route::get('datacheckout', [BarangController::class, 'adminCheckout'])->name('admin.checkout');
     Route::post('verifikasi-checkout/{id}', [BarangController::class, 'verifikasiCheckout'])->name('verifikasi.checkout');
    });
   
    //  Route::resource('inputbarang', BarangController::class)->names('admin.databarang.create');

Route::get('user/dashboard', [HomeController::class, 'userDashboard'])
    ->middleware(['auth', 'usertype:user'])
    ->name('dashboard.user');

Route::get('/shop', [BarangController::class, 'shop'])->name('shop');
Route::get('user/shop/kategori/{id}', [BarangController::class, 'barangByKategori']);

Route::get('/user/shop/detail/{id}', [BarangController::class, 'detail'])->name('shop.detail');
Route::post('/checkout', [BarangController::class, 'checkout'])->name('user.checkout');
Route::post('/checkout', [BarangController::class, 'checkout'])->name('user.checkout.form'); // hanya untuk POST dari keranjang

// web.php


Route::middleware(['auth'])->group(function () {
    // === USER AREA ===
    Route::get('/keranjang', [BarangController::class, 'showKeranjang'])->name('user.keranjang');
    Route::post('/keranjang/{id}', [BarangController::class, 'tambahKeKeranjang'])->name('keranjang.tambah');
    Route::delete('/keranjang/{id}', [BarangController::class, 'hapusDariKeranjang'])->name('keranjang.hapus');
    Route::get('/checkout', [BarangController::class, 'showCheckoutForm'])->name('user.checkout');
    Route::post('/checkout/selesai', [BarangController::class, 'prosesCheckout'])->name('user.prosesCheckout');
    Route::get('/checkout', [BarangController::class, 'showCheckoutForm'])->name('user.checkout');
    Route::post('/checkout/form', [BarangController::class, 'checkout'])->name('user.checkout.form');
     Route::get('/checkout/upbukti/{id}', [BarangController::class, 'formUploadBukti'])->name('user.upbukti');
    Route::post('/checkout/upbukti/{id}', [BarangController::class, 'simpanBukti'])->name('user.simpanBukti');

// Route::get('/checkout/status', function () {
//     return view('user.checkout'); // pastikan view-nya ada
// })->name('user.checkout.status');
});




