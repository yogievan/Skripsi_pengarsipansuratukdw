<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dosenStaffController extends Controller
{
    public function viewDashboard(){
        return view('dosen_staff.dashboard');
    }
}
