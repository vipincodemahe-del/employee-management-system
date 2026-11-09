@extends('layouts.app')

@section('title', $department->name)

@section('content')
<div class="card">
    <div class="toolbar">
        <h1>{{ $department->name }}</h1>
        <a class="btn btn-light" href="{{ route('departments.index') }}">Back</a>
    </div>
    <p><strong>Code:</strong> {{ $department->code }}</p>
    <p class="muted">{{ $department->description }}</p>
    <h2>Employees</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Age</th>
                <th>Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($department->employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->date_of_birth->format('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="muted">No employees in this department.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
