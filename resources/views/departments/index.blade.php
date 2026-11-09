@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<div class="card">
    <div class="toolbar">
        <h1>Departments</h1>
        <a class="btn" href="{{ route('departments.create') }}">Add Department</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->employees_count }}</td>
                    <td>
                        <a class="btn btn-small btn-light" href="{{ route('departments.show', $department) }}">View</a>
                        <a class="btn btn-small" href="{{ route('departments.edit', $department) }}">Edit</a>
                        <form method="POST" action="{{ route('departments.destroy', $department) }}" style="display:inline;" onsubmit="return confirm('Delete this department?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-small btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="muted">No departments found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $departments->links() }}</div>
</div>
@endsection
