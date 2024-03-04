<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// AUTH
Route::get('/', [AuthController::class, 'viewLogin'])->name('login');

// USER KEPALA BIDANG

// USER DOSEN DAN STAFF

// USER SEKRETARIAT
