<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function ViewLogin(){
        return view('auth.login');
    }

    public function ValidateLogin(Request $request){
        // validate
        $request -> validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // validate input request
        $datalogin = [
            'username' => $request -> username,
            'password' => $request -> password,
        ];

        if(Auth::attempt($datalogin)){
            //hak akses
            if(Auth::user()->role == 'KepalaBidang'){
                return redirect(route('Dashboard_kepalaBidang'))->with('toast_success', 'Login Berhasil, Selamat Datang!');
            } 
            elseif(Auth::user()->role == 'DosenStaff'){
                return redirect(route('Dashboard_dosenStaff'))->with('toast_success', 'Login Berhasil, Selamat Datang!');
            }
            elseif(Auth::user()->role == 'Sekretariat'){
                return redirect(route('Dashboard_sekretariat'))->with('toast_success', 'Login Berhasil, Selamat Datang!');
            }
            elseif(Auth::user()->role == 'Admin'){
                return redirect(route('KelolaPengguna_admin'))->with('toast_success', 'Login Berhasil, Selamat Datang!');
            }
        }
        else{
            return redirect(route('login'))->withErrors('Email atau Password tidak terdaftar!');
        }
    }

    // logout
    public function Logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    // Profile Setting
    public function UpdateUser($id, Request $request){
        $users = User::find($id);
        $users -> nama = $request -> nama;
        $users -> username = $request -> username;
        $users -> password = bcrypt($request -> password);
        $users -> save();
        return Redirect::back()->with('toast_success', 'Update Data Pengguna Berhasil!');
    }
}
