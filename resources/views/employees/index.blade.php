@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="card">
    <div class="toolbar">
        <h1>Employees</h1>
        <a class="btn" href="{{ route('employees.create') }}">Add Employee</a>
    </div>

    <form method="GET" action="{{ route('employees.index') }}" class="toolbar">
        <input type="search" name="search" value="{{ $search }}" placeholder="Search by name, email, phone or department">
        <button class="btn" type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Department Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>
                        @if ($employee->photoUrl())
                            <img class="avatar" src="{{ $employee->photoUrl() }}" alt="{{ $employee->name }}">
                        @endif
                        {{ $employee->name }}
                    </td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->date_of_birth->format('d M Y') }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>
                        <a class="btn btn-small btn-light" href="{{ route('employees.show', $employee) }}">View</a>
                        <a class="btn btn-small" href="{{ route('employees.edit', $employee) }}">Edit</a>
                        <form method="POST" action="{{ route('employees.destroy', $employee) }}" style="display:inline;" onsubmit="return confirm('Delete this employee?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-small btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="muted">No employees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $employees->links() }}
    </div>
</div>
@endsection
