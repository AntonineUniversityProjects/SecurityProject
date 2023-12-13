<?php
namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;


class PatientsController extends Controller
{
    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        Patient::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Patient added successfully.');
    }
}
