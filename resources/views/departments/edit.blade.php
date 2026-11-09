@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="card">
    <h1>Edit Department</h1>
    <form method="POST" action="{{ route('departments.update', $department) }}">
        @method('PUT')
        @include('departments._form', ['submitLabel' => 'Update Department'])
    </form>
</div>
@endsection
