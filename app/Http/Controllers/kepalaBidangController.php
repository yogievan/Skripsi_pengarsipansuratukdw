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
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class kepalaBidangController extends Controller
{
    public function ViewDashboard(){
        $nama = Auth::user()->nama;
        return view('kepala_bidang.dashboard', [
            'nama'=> $nama,
        ]);
    }

    public function ViewArsipSurat(){
        $unit = Unit::all();
        $kategori = Kategori::all();
        $pengirim = Auth::user()->email;
        $date = date('d-m-y');

        $suratMasuk = SuratMasuk::orderBy('id','ASC')->where('email_pengirim', $pengirim)->whereDate('created_at', now()->toDate())->paginate(5);
        $suratKeluar = SuratKeluar::orderBy('id','ASC')->where('email_pengirim', $pengirim)->whereDate('created_at', now()->toDate())->paginate(5);
        return view('kepala_bidang.arsip_surat',[
            'unit' => $unit,
            'kategori' => $kategori,
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'pengirim' => $pengirim,
            'date' => $date,
        ]);
    }

    public function TambahArsipSuratMasuk(Request $request){
        SuratMasuk::create([
            'id_kategori' => $request -> id_kategori,
            'id_unit' => $request -> id_unit,
            'email_pengirim' => $request -> email_pengirim,
            'email_tujuan' => $request -> email_tujuan,
            'perihal' => $request -> perihal,
            'keterangan' => $request -> keterangan,
            'berkas' => $request -> berkas,
            'status' => $request -> status,
            'email_pengarsip'  => $request -> email_pengarsip,
        ]);
        return Redirect::back()->with('toast_success', 'Surat Berhasil di Arsipkan!');
    }

    public function TambahArsipSuratKeluar(Request $request){
        SuratKeluar::create([
            'id_kategori' => $request -> id_kategori,
            'id_unit' => $request -> id_unit,
            'kode_surat' => $request -> kode_surat,
            'email_pengirim' => $request -> email_pengirim,
            'email_tujuan' => $request -> email_tujuan,
            'perihal' => $request -> perihal,
            'keterangan' => $request -> keterangan,
            'berkas' => $request -> berkas,
            'status' => $request -> status,
            'email_pengarsip'  => $request -> email_pengarsip,
        ]);
        return Redirect::back()->with('toast_success', 'Surat Berhasil di Arsipkan!');           
    }

    public function DetailArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $users = User::all();
        $unit = Unit::all();
        $kategori = Kategori::all();
        $sifat = Sifat::all();

        $statusValid = "Tervalidasi Sekretariat";
        if ($suratMasuk -> status == $statusValid) {
            $akses = " ";
        }else {
            $akses = "hidden";
        }

        return view('kepala_bidang.detail_surat_masuk',[
            'suratMasuk' => $suratMasuk,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
            'akses' => $akses,
        ]);
    }

    public function DetailArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $users = User::all();
        $unit = Unit::all();
        $kategori = Kategori::all();
        $sifat = Sifat::all();

        $statusValid = "Tervalidasi Sekretariat";
        if ($suratKeluar -> status == $statusValid) {
            $akses = " ";
        }else {
            $akses = "hidden";
        }

        return view('kepala_bidang.detail_surat_keluar',[
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
            'akses' => $akses,
        ]);
    }

    public function EditArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $unit = Unit::all();
        $kategori = Kategori::all();

        return view('kepala_bidang.update_surat_masuk',[
            'suratMasuk' => $suratMasuk,
            'unit' => $unit,
            'kategori' => $kategori,
        ]);
    }
    public function EditArsipSuratMasuk_updated($id, Request $request){
        $suratMasuk = SuratMasuk::find($id);
        $suratMasuk -> id_kategori = $request -> id_kategori;
        $suratMasuk -> id_unit = $request -> id_unit;
        $suratMasuk -> email_pengirim = $request -> email_pengirim;
        $suratMasuk -> email_tujuan = $request -> email_tujuan;
        $suratMasuk -> perihal = $request -> perihal;
        $suratMasuk -> keterangan = $request -> keterangan;
        $suratMasuk -> berkas = $request -> berkas;
        $suratMasuk -> save();
        return redirect(route('ArsipSurat_kepalaBidang'))->with('toast_success', 'Surat Berhasil di Edit!'); 
    }

    public function EditArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $unit = Unit::all();
        $kategori = Kategori::all();

        return view('kepala_bidang.update_surat_keluar',[
            'suratKeluar' => $suratKeluar,
            'unit' => $unit,
            'kategori' => $kategori,
        ]);
    }
    public function EditArsipSuratKeluar_updated($id, Request $request){
        $suratkeluar = SuratKeluar::find($id);
        $suratkeluar -> id_kategori = $request -> id_kategori;
        $suratkeluar -> id_unit = $request -> id_unit;
        $suratkeluar -> kode_surat = $request -> kode_surat;
        $suratkeluar -> email_pengirim = $request -> email_pengirim;
        $suratkeluar -> email_tujuan = $request -> email_tujuan;
        $suratkeluar -> perihal = $request -> perihal;
        $suratkeluar -> keterangan = $request -> keterangan;
        $suratkeluar -> berkas = $request -> berkas;
        $suratkeluar -> save();
        return redirect(route('ArsipSurat_kepalaBidang'))->with('toast_success', 'Surat Berhasil di Edit!'); 
    }

    public function viewListSuratMasuk(){
        $pengirim = Auth::user()->email;
        $suratMasuk = SuratMasuk::orderBy('id','DESC')->where('email_pengirim', $pengirim)->paginate(25);
        return view('kepala_bidang.list_surat_masuk',[
            'suratMasuk' => $suratMasuk,
        ]);
    }

    public function viewListSuratKeluar(){
        $pengirim = Auth::user()->email;
        $suratKeluar = SuratKeluar::orderBy('id','DESC')->where('email_pengirim', $pengirim)->paginate(25);
        return view('kepala_bidang.list_surat_keluar',[
            'suratKeluar' => $suratKeluar,
        ]);
    }

    public function ViewListDisposisiSuratMasuk(){
        $disposisiSuratMasuk  = DisposisiSuratMasuk::orderBy('id', 'DESC')->paginate(25);
        return view('kepala_bidang.list_surat_disposisi_surat_masuk',[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
        ]);
    }

    public function ViewListDisposisiSuratKeluar(){
        $disposisiSuratKeluar  = DisposisiSuratKeluar::orderBy('id', 'DESC')->paginate(25);
        return view('kepala_bidang.list_surat_disposisi_surat_keluar',[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
        ]);
    }

    public function DetailDisposisiSuratMasuk($id){
        $disposisiSuratMasuk = DisposisiSuratMasuk::find($id);
        $users = User::all();
        $sifat = Sifat::all();

        return view('kepala_bidang.detail_disposisi_surat_masuk',[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'sifat' => $sifat,
            'users' => $users,
        ]);
    }

    public function DetailDisposisiSuratKeluar($id){
        $disposisiSuratKeluar = DisposisiSuratKeluar::find($id);
        $users = User::all();
        $sifat = Sifat::all();

        return view('kepala_bidang.detail_disposisi_surat_keluar',[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
            'sifat' => $sifat,
            'users' => $users,
        ]);
    }
}
