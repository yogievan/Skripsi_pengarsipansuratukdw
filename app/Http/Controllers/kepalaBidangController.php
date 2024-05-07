<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class kepalaBidangController extends Controller
{
    public function ViewDashboard(){
        $nama = Auth::user()->nama;
        return view('kepala_bidang.dashboard',
        [
            'nama'=> $nama,
        ]
    );
    }

    public function ViewArsipSurat(){
        return view('kepala_bidang.arsip_surat');
    }

    public function ViewListSuratMasuk(){
        return view('kepala_bidang.list_surat_masuk');
    }

    public function ViewListSuratKeluar(){
        return view('kepala_bidang.list_surat_keluar');
    }

    public function ViewListSuratDisposisi(){
        return view('kepala_bidang.list_surat_disposisi');
    }

    public function ViewDetailDisposisiSuratMasuk(){
        return view('kepala_bidang.detail_disposisi_surat_masuk');
    }
    
    public function ViewDetailDisposisiSuratKeluar(){
        return view('kepala_bidang.detail_disposisi_surat_keluar');
    }
}
