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
use Illuminate\Support\Facades\Storage;

class sekretariatController extends Controller
{
    public function viewDashboard(){
        return view('sekretariat.dashboard');
    }

    public function viewArsipSurat(){
        $unit = Unit::all();
        $kategori = Kategori::all();

        $suratMasuk = SuratMasuk::orderBy('id','ASC')->paginate(5);
        $suratKeluar = SuratKeluar::orderBy('id','ASC')->paginate(5);
        return view('sekretariat.arsip_surat',[
            'unit' => $unit,
            'kategori' => $kategori,
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
        ]);
    }

    public function TambahArsipSuratMasuk(Request $request){
        SuratMasuk::create([
            'id_kategori' => $request -> id_kategori,
            'id_unit' => $request -> id_unit,
            'email_pengirim' => $request -> email_pengirim,
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

        return view('sekretariat.detail_surat_masuk',[
            'suratMasuk' => $suratMasuk,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
        ]);
    }
    public function EditArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $unit = Unit::all();
        $kategori = Kategori::all();

        return view('sekretariat.update_surat_masuk',[
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
        $suratMasuk -> perihal = $request -> perihal;
        $suratMasuk -> keterangan = $request -> keterangan;
        $suratMasuk -> berkas = $request -> berkas;
        $suratMasuk -> save();
        return redirect(route('ArsipSurat_sekretariat'))->with('toast_success', 'Surat Berhasil di Edit!'); 
    }

    public function UpdateSuratMasuk($id, Request $request){
        $suratMasuk = SuratMasuk::find($id);
        $status = "Tervalidasi Sekretariat";
        $suratMasuk -> status = $status;
        $suratMasuk -> save();
        return Redirect::back()->with('toast_success', 'Surat Berhasil di Validasi!'); 
    }

    public function DetailArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $users = User::all();
        $unit = Unit::all();
        $kategori = Kategori::all();
        $sifat = Sifat::all();

        return view('sekretariat.detail_surat_keluar',[
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
        ]);
    }
    public function EditArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $unit = Unit::all();
        $kategori = Kategori::all();

        return view('sekretariat.update_surat_keluar',[
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
        $suratkeluar -> email_tujuan = $request -> email_tujuan;
        $suratkeluar -> perihal = $request -> perihal;
        $suratkeluar -> keterangan = $request -> keterangan;
        $suratkeluar -> berkas = $request -> berkas;
        $suratkeluar -> save();
        return redirect(route('ArsipSurat_sekretariat'))->with('toast_success', 'Surat Berhasil di Edit!'); 
    }
    public function UpdateSuratKeluar($id, Request $request){
        $suratKeluar = SuratKeluar::find($id);
        $status = "Tervalidasi Sekretariat";
        $suratKeluar -> status = $status;
        $suratKeluar -> save();
        return Redirect::back()->with('toast_success', 'Surat Berhasil di Validasi!'); 
    }
    public function HapusArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $suratMasuk->delete();
        return redirect(route('ArsipSurat_sekretariat'))->with('toast_success', 'Surat Berhasil di Hapus!'); 
    }
    public function HapusArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $suratKeluar->delete();
        return redirect(route('ArsipSurat_sekretariat'))->with('toast_success', 'Surat Berhasil di Hapus!'); 
    }
    
    
    public function viewListSuratMasuk(){
        $suratMasuk = SuratMasuk::orderBy('id','ASC')->paginate(5);
        return view('sekretariat.list_surat_masuk',[
            'suratMasuk' => $suratMasuk,
        ]);
    }

    public function viewListSuratKeluar(){
        $suratKeluar = SuratKeluar::orderBy('id','ASC')->paginate(5);
        return view('sekretariat.list_surat_keluar',[
            'suratKeluar' => $suratKeluar,
        ]);
    }

    public function ViewListDisposisiSuratMasuk(){
        $disposisiSuratMasuk  = DisposisiSuratMasuk::orderBy('id', 'DESC')->paginate(25);
        return view('sekretariat.list_surat_disposisi_surat_masuk',[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
        ]);
    }

    public function TambahArsipDisposisiSuratMasuk(Request $request){
        DisposisiSuratMasuk::create([
            'id_sifat' => $request -> id_sifat,
            'id_surat_masuk' => $request -> id_surat_masuk,
            'email_tujuan' => $request -> email_tujuan,
            'catatan' => $request -> catatan,
            'lampiran' => $request -> lampiran,
            'status' => $request -> status,
            'email_pengarsip' => $request -> email_pengarsip,

        ]);
        return redirect(route('ListDisposisiSuratMasuk_sekretariat'))->with('toast_success', 'Surat Berhasil di Disposisi'); 
    }

    public function ViewListDisposisiSuratKeluar(){
        $disposisiSuratKeluar  = DisposisiSuratKeluar::orderBy('id', 'DESC')->paginate(25);
        return view('sekretariat.list_surat_disposisi_surat_keluar',[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
        ]);
    }

    public function TambahArsipDisposisiSuratKeluar(Request $request){
        DisposisiSuratKeluar::create([
            'id_sifat' => $request -> id_sifat,
            'id_surat_keluar' => $request -> id_surat_keluar,
            'email_tujuan' => $request -> email_tujuan,
            'catatan' => $request -> catatan,
            'lampiran' => $request -> lampiran,
            'status' => $request -> status,
            'email_pengarsip' => $request -> email_pengarsip,

        ]);
        return redirect(route('ListDisposisiSuratKeluar_sekretariat'))->with('toast_success', 'Surat Berhasil di Disposisi'); 
    }
}
