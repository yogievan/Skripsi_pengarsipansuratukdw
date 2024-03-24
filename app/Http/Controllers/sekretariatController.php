<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sekretariatController extends Controller
{
    public function viewDashboard(){
        $nama = Auth::user()->nama;
        return view('sekretariat.dashboard', 
        [
            'nama'=> $nama,
        ]);
    }

    public function viewArsipSurat(){
        return view('sekretariat.arsip_surat');
    }
    public function viewTambahSuratMasuk(){
        return view('sekretariat.tambah_surat_masuk');
    }
    public function viewDetailArsipSurat(){
        return view('sekretariat.detail_arsip_surat');
    }
    public function viewListSuratMasuk(){
        return view('sekretariat.list_surat_masuk');
    }
    public function viewListSuratKeluar(){
        return view('sekretariat.list_surat_keluar');
    }
    public function viewListSuratDisposisi(){
        return view('sekretariat.list_surat_disposisi');
    }
    public function viewKelolaPengguna(){
        return view('sekretariat.kelola_pengguna');
    }
    public function viewTambahPengguna(){
        return view('sekretariat.tambah_pengguna');
    }
}
