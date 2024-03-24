<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dosenStaffController;
use App\Http\Controllers\kepalaBidangController;
use App\Http\Controllers\sekretariatController;
use Illuminate\Support\Facades\Route;


// AUTH
Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/cek_login', [AuthController::class, 'validateLogin'])->name('cekLogin');
});

Route::middleware(['auth'])->group(function(){
    Route::group(['middleware' => 'prevent-back-history'],function(){
        // USER KEPALA BIDANG
        Route::middleware('cekRole:KepalaBidang')->group(function () {
            Route::get('/KepalaBidang/Dashboard', [kepalaBidangController::class, 'viewDashboard'])->name('Dashboard_kepalaBidang');
            Route::get('/KepalaBidang/ArsipSurat', [kepalaBidangController::class, 'viewArsipSurat'])->name('ArsipSurat_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratMasuk', [kepalaBidangController::class, 'viewListSuratMasuk'])->name('ListSuratMasuk_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratKeluar', [kepalaBidangController::class, 'viewListSuratKeluar'])->name('ListSuratKeluar_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratDisposisi', [kepalaBidangController::class, 'viewListSuratDisposisi'])->name('ListSuratDisposisi_kepalaBidang');
        });

        // USER DOSEN DAN STAFF
        Route::middleware('cekRole:DosenStaff')->group(function () {
            Route::get('/DosenStaff/Dashboard', [dosenStaffController::class, 'viewDashboard'])->name('Dashboard_dosenStaff');
            Route::get('/DosenStaff/ArsipSurat', [dosenStaffController::class, 'viewArsipSurat'])->name('ArsipSurat_dosenStaff');
            Route::get('/DosenStaff/ListSuratMasuk', [dosenStaffController::class, 'viewListSuratMasuk'])->name('ListSuratMasuk_dosenStaff');
            Route::get('/DosenStaff/ListSuratKeluar', [dosenStaffController::class, 'viewListSuratKeluar'])->name('ListSuratKeluar_dosenStaff');
            Route::get('/DosenStaff/ListSuratDisposisi', [dosenStaffController::class, 'viewListSuratDisposisi'])->name('ListSuratDisposisi_dosenStaff');
        });

        // USER SEKRETARIAT
        Route::middleware('cekRole:Sekretariat')->group(function () {
            Route::get('/Sekretariat/Dashboard', [sekretariatController::class, 'viewDashboard'])->name('Dashboard_sekretariat');
            Route::get('/Sekretariat/ArsipSurat', [sekretariatController::class, 'viewArsipSurat'])->name('ArsipSurat_sekretariat');
            Route::get('/Sekretariat/TambahSuratMasuk', [sekretariatController::class, 'viewTambahSuratMasuk'])->name('TambahSuratMasuk_sekretariat');
            Route::get('/Sekretariat/DetailArsipSurat', [sekretariatController::class, 'viewDetailArsipSurat'])->name('DetailArsipSurat_sekretariat');
            Route::get('/Sekretariat/ListSuratMasuk', [sekretariatController::class, 'viewListSuratMasuk'])->name('ListSuratMasuk_sekretariat');
            Route::get('/Sekretariat/ListSuratKeluar', [sekretariatController::class, 'viewListSuratKeluar'])->name('ListSuratKeluar_sekretariat');
            Route::get('/Sekretariat/ListSuratDisposisi', [sekretariatController::class, 'viewListSuratDisposisi'])->name('ListSuratDisposisi_sekretariat');
            Route::get('/Sekretariat/KelolaPengguna', [sekretariatController::class, 'viewKelolaPengguna'])->name('KelolaPengguna_sekretariat');
            Route::get('/Sekretariat/TambahPengguna', [sekretariatController::class, 'viewTambahPengguna'])->name('TambahPengguna_sekretariat');
        });

        // Logout
        Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    });        
});