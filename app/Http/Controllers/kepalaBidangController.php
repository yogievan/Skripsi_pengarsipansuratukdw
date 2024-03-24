<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kepalaBidangController extends Controller
{
    public function viewDashboard(){
        return view('kepala_bidang.dashboard');
    }
    public function viewArsipSurat(){
        return view('kepala_bidang.arsip_surat');
    }
    public function viewListSuratMasuk(){
        return view('kepala_bidang.list_surat_masuk');
    }
    public function viewListSuratKeluar(){
        return view('kepala_bidang.list_surat_keluar');
    }
    public function viewListSuratDisposisi(){
        return view('kepala_bidang.list_surat_disposisi');
    }
}
