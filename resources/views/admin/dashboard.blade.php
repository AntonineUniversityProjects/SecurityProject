<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Admin Dashboard</h2>

    <div>
        <p>Welcome to the admin dashboard. Here, you can access the Doctor and Patient APIs:</p>
        
        <ul>
            <li><a href="{{ route('doctors.index') }}">Doctor API</a></li>
            <li><a href="{{ route('patients.index') }}">Patient API</a></li>
        </ul>
    </div>
@endsection
