<!-- resources/views/doctor/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome, Dr. {{ Auth::user()->name }}</h2>

        <!-- Display relevant information for the doctor -->
        <div class="card mt-4">
            <div class="card-header">
                Upcoming Appointments
            </div>
            <div class="card-body">
                <!-- Display a list of upcoming appointments -->
                <ul>
                    <li>Appointment 1 - Date and Time</li>
                    <li>Appointment 2 - Date and Time</li>
                    <!-- Add more appointments as needed -->
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Patient Information
            </div>
            <div class="card-body">
                <!-- Display relevant patient information or link to patient records -->
                <p>You have X patients under your care.</p>
                <a href="{{ route('patients.index') }}">View Patient Records</a>
            </div>
        </div>

        <!-- Add more sections as needed -->

    </div>
@endsection
