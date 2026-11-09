@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
<div class="card">
    <h1>Employee Registration</h1>
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        @include('employees._form', ['submitLabel' => 'Save Employee'])
    </form>
</div>
@endsection
