<?php

namespace App\Http\Controllers;

use App\Models\DisposisiSuratKeluar;
use App\Models\DisposisiSuratMasuk;
use App\Models\Kategori;
use App\Models\Sifat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Unit;
use App\Models\User;
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

    public function ViewListSuratMasuk(){
        $email = Auth::user()->email;
        $suratMasuk = SuratMasuk::orderBy('id','ASC')->where('email_tujuan', $email)->where('status', 'Tervalidasi Sekretariat')->paginate(25);
        return view('dosen_staff.list_surat_masuk',[
            'suratMasuk' => $suratMasuk
        ]);
    }
    public function DetailArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $users = User::all();
        $kategori = Kategori::all();
        $unit = Unit::all();

        return view('dosen_staff.detail_surat_masuk',[
            'suratMasuk' => $suratMasuk,
            'users' => $users,
            'kategori' => $kategori,
            'unit' => $unit,
        ]);
    }

    public function ViewListSuratKeluar(){
        $email = Auth::user()->email;
        $suratKeluar = SuratKeluar::orderBy('id','ASC')->where('email_tujuan', $email)->where('status', 'Tervalidasi Sekretariat')->paginate(25);
        return view('dosen_staff.list_surat_keluar',[
            'suratKeluar' => $suratKeluar,
        ]);
    }

    public function DetailArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $users = User::all();
        $kategori = Kategori::all();
        $unit = Unit::all();

        return view('dosen_staff.detail_surat_keluar',[
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'kategori' => $kategori,
            'unit' => $unit,
        ]);
    }

    public function ViewListDisposisiSuratMasuk(){
        $email = Auth::user()->email;
        $disposisiSuratMasuk  = DisposisiSuratMasuk::orderBy('id', 'DESC')->where('email_tujuan', $email)->paginate(25);
        return view('dosen_staff.list_surat_disposisi_surat_masuk',[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
        ]);
    }

    public function ViewListDisposisiSuratKeluar(){
        $email = Auth::user()->email;
        $disposisiSuratKeluar  = DisposisiSuratKeluar::orderBy('id', 'DESC')->where('email_tujuan', $email)->paginate(25);
        return view('dosen_staff.list_surat_disposisi_surat_keluar',[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
        ]);
    }

    public function DetailDisposisiSuratMasuk($id){
        $disposisiSuratMasuk = DisposisiSuratMasuk::find($id);
        $users = User::all();
        $sifat = Sifat::all();

        return view('dosen_staff.detail_disposisi_surat_masuk',[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'sifat' => $sifat,
            'users' => $users,
        ]);
    }

    public function DetailDisposisiSuratKeluar($id){
        $disposisiSuratKeluar = DisposisiSuratKeluar::find($id);
        $users = User::all();
        $sifat = Sifat::all();

        return view('dosen_staff.detail_disposisi_surat_keluar',[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
            'sifat' => $sifat,
            'users' => $users,
        ]);
    }
}
