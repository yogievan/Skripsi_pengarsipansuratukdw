<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class kepalaBidangController extends Controller
{
    public function viewDashboard(){
        $nama = Auth::user()->nama;
        return view('kepala_bidang.dashboard',
        [
            'nama'=> $nama,
        ]
    );
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

    public function viewDetailDisposisiSuratMasuk(){
        return view('kepala_bidang.detail_disposisi_surat_masuk');
    }
    
    public function viewDetailDisposisiSuratKeluar(){
        return view('kepala_bidang.detail_disposisi_surat_keluar');
    }
}
