<?php

namespace App\Http\Controllers;

class DoctorControllerRoute extends Controller
{
    public function dashboard()
    {
        return view('admin.doctor.dashboard');
    }
}
