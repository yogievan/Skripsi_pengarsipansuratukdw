<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sekretariatController extends Controller
{
    public function viewDashboard(){
        return view('sekretariat.dashboard');
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
}
