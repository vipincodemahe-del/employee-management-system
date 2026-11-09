@extends('layouts.app')

@section('title', $employee->name)

@section('content')
<div class="card">
    <div class="toolbar">
        <h1>Employee Details</h1>
        <div>
            <a class="btn" href="{{ route('employees.edit', $employee) }}">Edit</a>
            <a class="btn btn-light" href="{{ route('employees.index') }}">Back</a>
        </div>
    </div>
    @if ($employee->photoUrl())
        <p><img class="avatar-lg" src="{{ $employee->photoUrl() }}" alt="{{ $employee->name }}"></p>
    @endif
    <table>
        <tr><th>Name</th><td>{{ $employee->name }}</td></tr>
        <tr><th>Email</th><td>{{ $employee->email }}</td></tr>
        <tr><th>Phone Number</th><td>{{ $employee->phone }}</td></tr>
        <tr><th>Age</th><td>{{ $employee->age }}</td></tr>
        <tr><th>Date of Birth</th><td>{{ $employee->date_of_birth->format('d M Y') }}</td></tr>
        <tr><th>Gender</th><td>{{ ucfirst($employee->gender) }}</td></tr>
        <tr><th>Department Name</th><td>{{ $employee->department->name }}</td></tr>
        <tr><th>Address</th><td>{{ $employee->address }}</td></tr>
    </table>
</div>
@endsection
