<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    public function ViewKelolaPengguna(){
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        $users = User::orderBy('id','DESC')->paginate(25);
        return view('admin.kelola_pengguna',
        [
            'jabatan' => $jabatan,
            'unit' => $unit,
            'users' => $users,
        ]);
    }

    public function TambahPengguna(Request $request){
        User::create([
            'nama' => $request -> nama,
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => $request -> password,
            'role' => $request -> role,
            'id_unit' => $request -> id_unit,
            'id_jabatan' => $request -> id_jabatan,

        ]);
        return Redirect::back()->with('toast_success', 'Data Pengguna Berhasil Ditambahkan!');
    }

    public function DetailPengguna($id){
        $user = User::find($id);
        $units = Unit::all();
        $jabatans = Jabatan::all();

        return view('admin.detail_pengguna', 
        [
            'user' => $user,
        ]);
    }

    public function ViewKategori(){
        $kategori = Kategori::paginate(10);
        return view('admin.kategori',
        [
            'kategori' => $kategori,
        ]);
    } 

    public function TambahKategori(Request $request){
        Kategori::create([
            'kategori' => $request -> kategori,
            'deskripsi' => $request -> deskripsi,
        ]);
        return Redirect::back()->with('toast_success', 'Data Kategori Surat Berhasil Ditambahkan!');
    }

    public function ViewEditKategori($id){
        $kategori = Kategori::find($id);
        return view('admin.update_kategori',
        [
            'kategori' => $kategori,
        ]);
    }

    public function EditKategori($id, Request $request){
        $kategori = Kategori::find($id);
        $kategori -> kategori = $request -> kategori;
        $kategori -> deskripsi = $request -> deskripsi;
        $kategori -> save();
        return redirect(route('Kategori_admin'))->with('toast_success', 'Data Kategori Surat Berhasil Diperbarui!');
    }

    public function HapusKategori($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect(route('Kategori_admin'))->with('toast_success', 'Data Kategori Surat Berhasil Dihapus!');
    }

    public function ViewUnit(){
        $unit = Unit::paginate(25);
        return view('admin.unit',
        [
            'unit' => $unit,
        ]);
    } 

    public function TambahUnit(Request $request){
        Unit::create([
            'unit' => $request -> unit,
        ]);
        return Redirect::back()->with('toast_success', 'Data Unit Berhasil Ditambahkan!');
    }

    public function ViewEditUnit($id){
        $unit = Unit::find($id);
        return view('admin.update_unit',
        [
            'unit' => $unit,
        ]);
    }

    public function EditUnit($id, Request $request){
        $unit = Unit::find($id);
        $unit -> unit = $request -> unit;
        $unit -> save();
        return redirect(route('Unit_admin'))->with('toast_success', 'Data Unit UKDW Berhasil Diperbarui!');
    }
    
    public function HapusUnit($id){
        $unit = Unit::find($id);
        $unit->delete();
        return redirect(route('Unit_admin'))->with('toast_success', 'Data Unit UKDW Berhasil Dihapus!');
    }
}
