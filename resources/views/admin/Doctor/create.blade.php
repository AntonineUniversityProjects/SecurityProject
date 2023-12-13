<!-- resources/views/admin/doctors/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Add Doctor</h2>

    <form method="post" action="{{ route('doctors.store') }}">
        @csrf

        <!-- Add Doctor form fields here -->

        <button type="submit">Add Doctor</button>
    </form>
@endsection
