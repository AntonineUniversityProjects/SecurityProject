<!-- resources/views/admin/doctors/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Add Doctor</h2>

    <form method="post" action="{{ route('doctors.store') }}">
        @csrf

        <!-- Add Doctor form fields here -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="specialization">Specialization:</label>
        <input type="text" id="specialization" name="specialization" required>

        <!-- Add other form fields as needed -->

        <button type="submit">Add Doctor</button>
    </form>
@endsection
