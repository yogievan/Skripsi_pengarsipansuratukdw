<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Unit;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    public function viewDashboard(){
        $nama = Auth::user()->nama;
        $users = User::all()->count();
        return view('admin.dashboard', 
        [
            'nama'=> $nama,
            'users'=> $users,
        ]);
    }

    public function viewKelolaPengguna(){
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        $users = User::all();
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
}
