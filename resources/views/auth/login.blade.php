@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="login-wrap">
    <div class="card login-card">
        <h1>Admin Login</h1>
        <p class="muted">Sign in to manage employees and departments.</p>
        <form method="POST" action="{{ route('login.attempt') }}" style="margin-top:18px;">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>
            <label style="font-weight:500; margin-bottom:14px;">
                <input type="checkbox" name="remember" value="1" style="width:auto;"> Remember me
            </label>
            <button class="btn" type="submit">Login</button>
        </form>
        <p class="muted" style="margin-top:16px;">Demo: admin@example.com / password</p>
    </div>
</div>
@endsection
