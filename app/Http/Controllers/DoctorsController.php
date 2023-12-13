<?php
namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function create()
    {
        return view('admin.Doctor.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        Doctor::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Doctor added successfully.');
    }
}
