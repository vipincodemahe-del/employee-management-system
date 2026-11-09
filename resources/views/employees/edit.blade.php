@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="card">
    <h1>Edit Employee</h1>
    <form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('employees._form', ['submitLabel' => 'Update Employee'])
    </form>
</div>
@endsection
