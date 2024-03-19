<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dosenStaffController;
use App\Http\Controllers\kepalaBidangController;
use App\Http\Controllers\sekretariatController;
use Illuminate\Support\Facades\Route;


// AUTH
Route::get('/', [AuthController::class, 'viewLogin'])->name('login');

// USER KEPALA BIDANG
Route::get('/Dashboard/KepalaBidang', [kepalaBidangController::class, 'viewDashboard'])->name('Dashboard_kepalaBidang');

// USER DOSEN DAN STAFF
Route::get('/Dashboard/DosenStaff', [dosenStaffController::class, 'viewDashboard'])->name('Dashboard_dosenStaff');

// USER SEKRETARIAT
Route::get('/Dashboard/Sekretariat', [sekretariatController::class, 'viewDashboard'])->name('Dashboard_sekretariat');
Route::get('/Sekretariat/ArsipSurat', [sekretariatController::class, 'viewArsipSurat'])->name('ArsipSurat_sekretariat');
Route::get('/Sekretariat/TambahSuratMasuk', [sekretariatController::class, 'viewTambahSuratMasuk'])->name('TambahSuratMasuk_Sekretariat');
Route::get('/Sekretariat/DetailArsipSurat', [sekretariatController::class, 'viewDetailArsipSurat'])->name('DetailArsipSurat_sekretariat');
Route::get('/Sekretariat/ListSuratMasuk', [sekretariatController::class, 'viewListSuratMasuk'])->name('ListSuratMasuk_sekretariat');
Route::get('/Sekretariat/ListSuratKeluar', [sekretariatController::class, 'viewListSuratKeluar'])->name('ListSuratKeluar_sekretariat');
Route::get('/Sekretariat/ListSuratDisposisi', [sekretariatController::class, 'viewListSuratDisposisi'])->name('ListSuratDisposisi_sekretariat');
Route::get('/Sekretariat/KelolaPengguna', [sekretariatController::class, 'viewKelolaPengguna'])->name('KelolaPengguna_sekretariat');


