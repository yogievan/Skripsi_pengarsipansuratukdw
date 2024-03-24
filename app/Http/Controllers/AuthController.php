<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login');
    }

    public function validateLogin(Request $request){
        // validate
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // validate input request
        $datalogin = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if(Auth::attempt($datalogin)){
            //hak akses
            if(Auth::user()->role == 'KepalaBidang'){
                return redirect(route('Dashboard_kepalaBidang'));
            } 
            elseif(Auth::user()->role == 'DosenStaff'){
                return redirect(route('Dashboard_dosenStaff'));
            }
            elseif(Auth::user()->role == 'Sekretariat'){
                return redirect(route('Dashboard_sekretariat'));
            }
        }
        else{
            return redirect(route('login'))->withErrors('Email atau Password tidak terdaftar!');
        }
    }

    // logout
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
