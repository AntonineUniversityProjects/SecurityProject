<?php

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

// For Doctor
$doctor = Doctor::create($request->all());
$doctor->assignRole('doctor');

// For Admin
$admin = new Admin($request->all());
$admin->save();
$admin->assignRole('admin');

// For Patient
$patient = Patient::create($request->all());
$patient->assignRole('patient');
