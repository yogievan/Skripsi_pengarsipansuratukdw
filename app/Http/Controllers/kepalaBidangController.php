<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kepalaBidangController extends Controller
{
    public function viewDashboard(){
        return view('kepala_bidang.dashboard');
    }
    
}
