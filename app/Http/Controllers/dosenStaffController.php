<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class dosenStaffController extends Controller
{
    public function viewDashboard(){
        $nama = Auth::user()->nama;
        return view('dosen_staff.dashboard',
        [
            'nama'=> $nama,
        ]
    );
    }
    public function viewArsipSurat(){
        return view('dosen_staff.arsip_surat');
    }
    public function viewListSuratMasuk(){
        return view('dosen_staff.list_surat_masuk');
    }
    public function viewListSuratKeluar(){
        return view('dosen_staff.list_surat_keluar');
    }
    public function viewListSuratDisposisi(){
        return view('dosen_staff.list_surat_disposisi');
    }
}
