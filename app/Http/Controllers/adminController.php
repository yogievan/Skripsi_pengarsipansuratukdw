<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function viewDashboard(){
        $nama = Auth::user()->nama;
        return view('admin.dashboard', 
        [
            'nama'=> $nama,
        ]);
    }

    public function viewKelolaPengguna(){
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        return view('admin.kelola_pengguna',[
            'jabatan' => $jabatan,
            'unit' => $unit,
        ]);
    }
}
