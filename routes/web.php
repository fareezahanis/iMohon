<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-saya', function () {  return view('profile.show'); })->name('profile.user');
    //  isi permohonan
    Route::get('/permohonan', [PermohonanController::class, 'create'])->name('permohonan.create');
    // simpan permohonan
    Route::post('/permohonan', [PermohonanController::class, 'store'])->name('permohonan.store');
   // senarai jadual permohonan
    Route::get('/senarai-permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::get('/dashboard', [PermohonanController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/inventori', [AdminController::class, 'inventori'])->name('inventori');
    Route::post('/inventori', [AdminController::class, 'storeInventori'])->name('inventori.store');
    Route::get('/vendor', [AdminController::class, 'vendor'])->name('vendor');
    Route::post('/vendor', [AdminController::class, 'storeVendor'])->name('vendor.store');
    Route::get('/kelulusan', [AdminController::class, 'kelulusan'])->name('kelulusan');
    Route::post('/kelulusan/{id}/update', [AdminController::class, 'updateStatus'])->name('kelulusan.update');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::post('/pengguna/store', [AdminController::class, 'storePengguna'])->name('pengguna.store');
    Route::delete('/inventori/{id}', [AdminController::class, 'destroyInventori'])->name('inventori.destroy');
    Route::get('/rekod-peminjaman', [AdminController::class, 'rekodPeminjaman'])->name('peminjaman');
    Route::post('/rekod-peminjaman/{id}/sahkan-pemulangan', [AdminController::class, 'sahkanPemulangan'])->name('peminjaman.sahkan');
});


    
require __DIR__.'/auth.php';
