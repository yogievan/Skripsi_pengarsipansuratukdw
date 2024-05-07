<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class dosenStaffController extends Controller
{
    public function ViewDashboard(){
        $nama = Auth::user()->nama;
        return view('dosen_staff.dashboard',
        [
            'nama'=> $nama,
        ]
    );
    }
    public function ViewArsipSurat(){
        return view('dosen_staff.arsip_surat');
    }

    public function ViewListSuratMasuk(){
        return view('dosen_staff.list_surat_masuk');
    }

    public function ViewListSuratKeluar(){
        return view('dosen_staff.list_surat_keluar');
    }
    
    public function ViewListSuratDisposisi(){
        return view('dosen_staff.list_surat_disposisi');
    }
}
