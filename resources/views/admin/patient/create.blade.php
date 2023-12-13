
@extends('layouts.admin')

@section('content')
    <h2>Add Patient</h2>

    <form method="post" action="{{ route('patients.store') }}">
        @csrf

        <!-- Add Patient form fields here -->

        <button type="submit">Add Patient</button>
    </form>
@endsection
