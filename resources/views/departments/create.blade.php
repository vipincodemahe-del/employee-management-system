@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
<div class="card">
    <h1>Add Department</h1>
    <form method="POST" action="{{ route('departments.store') }}">
        @include('departments._form', ['submitLabel' => 'Save Department'])
    </form>
</div>
@endsection
