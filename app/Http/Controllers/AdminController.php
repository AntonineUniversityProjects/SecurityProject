<?php
namespace App\Http\Controllers;
class AdminController extends Controller
{
    public function admindashboard()
    {
        return view('admin.dashboard');
    }
}
