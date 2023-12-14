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
        // Validation logic
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors|max:255',
            // Add more validation rules as needed
        ]);

        // Store data in the session
        $request->session()->put('doctor_name', $request->input('name'));

        // Create a new Doctor record
        Doctor::create($request->all());

        // Regenerate the session ID for security
        $request->session()->regenerate();

        // Redirect with success message
        return redirect()->route('admin.dashboard')->with('success', 'Doctor added successfully.');
    }
}
