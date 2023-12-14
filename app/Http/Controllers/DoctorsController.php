<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        Log::info('created a doctor');

        // Store data in the session
        $request->session()->put('doctor_name', $request->input('name'));

        // Create a new Doctor record
        Doctor::create($request->all());
        Log::info('created a doctor record.');


        // Regenerate the session ID for security
        $request->session()->regenerate();

        // Redirect with success message
        return redirect()->route('admin.dashboard')->with('success', 'Doctor added successfully.');
    }
}
