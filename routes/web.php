<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dosenStaffController;
use App\Http\Controllers\kepalaBidangController;
use App\Http\Controllers\sekretariatController;
use Illuminate\Support\Facades\Route;


// AUTH
Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'ViewLogin'])->name('login');
    Route::post('/cek_login', [AuthController::class, 'ValidateLogin'])->name('cekLogin');
});

Route::middleware(['auth'])->group(function(){
    Route::group(['middleware' => 'prevent-back-history'],function(){
        // USER KEPALA BIDANG
        Route::middleware('cekRole:KepalaBidang')->group(function () {
            Route::get('/KepalaBidang/Dashboard', [kepalaBidangController::class, 'ViewDashboard'])->name('Dashboard_kepalaBidang');
            Route::get('/KepalaBidang/ArsipSurat', [kepalaBidangController::class, 'ViewArsipSurat'])->name('ArsipSurat_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratMasuk', [kepalaBidangController::class, 'ViewListSuratMasuk'])->name('ListSuratMasuk_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratKeluar', [kepalaBidangController::class, 'ViewListSuratKeluar'])->name('ListSuratKeluar_kepalaBidang');
            Route::get('/KepalaBidang/ListSuratDisposisi', [kepalaBidangController::class, 'ViewListSuratDisposisi'])->name('ListSuratDisposisi_kepalaBidang');
            Route::get('/KepalaBidang/DetailDisposisiSuratMasuk', [kepalaBidangController::class, 'ViewDetailDisposisiSuratMasuk'])->name('DetailDisposisiSuratMasuk_kepalaBidang');
            Route::get('/KepalaBidang/DetailDisposisiSuratKeluar', [kepalaBidangController::class, 'ViewDetailDisposisiSuratKeluar'])->name('DetailDisposisiSuratKeluar_kepalaBidang');
        });

        // USER DOSEN DAN STAFF
        Route::middleware('cekRole:DosenStaff')->group(function () {
            Route::get('/DosenStaff/Dashboard', [dosenStaffController::class, 'ViewDashboard'])->name('Dashboard_dosenStaff');
            Route::get('/DosenStaff/ArsipSurat', [dosenStaffController::class, 'ViewArsipSurat'])->name('ArsipSurat_dosenStaff');
            Route::get('/DosenStaff/ListSuratMasuk', [dosenStaffController::class, 'ViewListSuratMasuk'])->name('ListSuratMasuk_dosenStaff');
            Route::get('/DosenStaff/ListSuratKeluar', [dosenStaffController::class, 'ViewListSuratKeluar'])->name('ListSuratKeluar_dosenStaff');
            Route::get('/DosenStaff/ListSuratDisposisi', [dosenStaffController::class, 'ViewListSuratDisposisi'])->name('ListSuratDisposisi_dosenStaff');
        });

        // USER SEKRETARIAT
        Route::middleware('cekRole:Sekretariat')->group(function () {
            Route::get('/Sekretariat/Dashboard', [sekretariatController::class, 'ViewDashboard'])->name('Dashboard_sekretariat');
            Route::get('/Sekretariat/ArsipSurat', [sekretariatController::class, 'ViewArsipSurat'])->name('ArsipSurat_sekretariat');
            Route::get('/Sekretariat/ListSuratMasuk', [sekretariatController::class, 'ViewListSuratMasuk'])->name('ListSuratMasuk_sekretariat');
            Route::get('/Sekretariat/ListSuratKeluar', [sekretariatController::class, 'ViewListSuratKeluar'])->name('ListSuratKeluar_sekretariat');
            Route::get('/Sekretariat/ListDisposisiSuratMasuk', [sekretariatController::class, 'ViewListDisposisiSuratMasuk'])->name('ListDisposisiSuratMasuk_sekretariat');
            Route::get('/Sekretariat/ListDisposisiSuratKeluar', [sekretariatController::class, 'ViewListDisposisiSuratKeluar'])->name('ListDisposisiSuratKeluar_sekretariat');

            Route::post('/Sekretariat/TambahArsipSuratMasuk', [sekretariatController::class, 'TambahArsipSuratMasuk'])->name('TambahArsipSuratMasuk_sekretariat');
            Route::get('/Sekretariat/DetailArsipSuratMasuk-{id}', [sekretariatController::class, 'DetailArsipSuratMasuk'])->name('DetailArsipSuratMasuk_sekretariat');
            Route::post('/Sekretariat/TambahArsipSuratKeluar', [sekretariatController::class, 'TambahArsipSuratKeluar'])->name('TambahArsipSuratKeluar_sekretariat');
            Route::get('/Sekretariat/DetailArsipSuratKeluar-{id}', [sekretariatController::class, 'DetailArsipSuratKeluar'])->name('DetailArsipSuratKeluar_sekretariat');
            Route::get('/Sekretariat/UpdateDetailArsipSuratMasuk-{id}', [sekretariatController::class, 'UpdateSuratMasuk'])->name('UpdateSuratMasuk_sekretariat');
            Route::get('/Sekretariat/UpdateDetailArsipSuratKeluar-{id}', [sekretariatController::class, 'UpdateSuratKeluar'])->name('UpdateSuratKeluar_sekretariat');
            Route::get('/Sekretariat/EditArsipSuratMasuk-{id}', [sekretariatController::class, 'EditArsipSuratMasuk'])->name('EditArsipSuratMasuk_sekretariat');
            Route::put('/Sekretariat/EditArsipSuratMasukSubmit-{id}', [sekretariatController::class, 'EditArsipSuratMasuk_updated']);
            Route::get('/Sekretariat/EditArsipSuratKeluar-{id}', [sekretariatController::class, 'EditArsipSuratKeluar'])->name('EditArsipSuratKeluar_sekretariat');
            Route::put('/Sekretariat/EditArsipSuratKeluarSubmit-{id}', [sekretariatController::class, 'EditArsipSuratKeluar_updated']);
            Route::get('/Sekretariat/HapusArsipSuratMasuk-{id}', [sekretariatController::class, 'HapusArsipSuratMasuk'])->name('HapusArsipSuratMasuk_sekretariat');
            Route::get('/Sekretariat/HapusArsipSuratKeluar-{id}', [sekretariatController::class, 'HapusArsipSuratKeluar'])->name('HapusArsipSuratKeluar_sekretariat');
        });

        // USER ADMIN
        Route::middleware('cekRole:Admin')->group(function () {
            Route::get('/Admin/KelolaPengguna', [adminController::class, 'ViewKelolaPengguna'])->name('KelolaPengguna_admin');
            Route::post('/Admin/TambahPengguna', [adminController::class, 'TambahPengguna'])->name('TambahPengguna_admin');
            Route::get('/Admin/DetailPengguna-{id}', [adminController::class, 'DetailPengguna']);
            Route::get('/Admin/Kategori', [adminController::class, 'ViewKategori'])->name('Kategori_admin');
            Route::post('/Admin/TambahKategori', [adminController::class, 'TambahKategori'])->name('TambahKategori_admin');
            Route::get('/Admin/EditKategori-{id}', [adminController::class, 'ViewEditKategori']);
            Route::put('/Admin/EditKategoriSubmit-{id}', [adminController::class, 'EditKategori']);
            Route::get('/Admin/HapusKategori-{id}', [adminController::class, 'HapusKategori']);
            Route::get('/Admin/Unit', [adminController::class, 'ViewUnit'])->name('Unit_admin');
            Route::post('/Admin/TambahUnit', [adminController::class, 'TambahUnit'])->name('TambahUnit_admin');
            Route::get('/Admin/EditUnit-{id}', [adminController::class, 'ViewEditUnit']);
            Route::put('/Admin/EditUnitSubmit-{id}', [adminController::class, 'EditUnit']);
            Route::get('/Admin/HapusUnit-{id}', [adminController::class, 'HapusUnit']);
        });
        
        // Logout
        Route::get('/Logout',[AuthController::class, 'Logout'])->name('logout');

        // Profile
        Route::put('/UpdateUser/{id}',[AuthController::class, 'UpdateUser']);
    });        
});