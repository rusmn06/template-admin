@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <span class="auth-brand-text">Template Admin</span>
        </div>

        <h1 class="auth-heading">Create an Account</h1>
        <p class="auth-subtitle">Fill in the details below to get started</p>

        @if ($errors->any())
            <div class="auth-alert auth-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-field">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="John Doe" value="{{ old('name') }}"
                       required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-field">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="you@example.com" value="{{ old('email') }}"
                       required autocomplete="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Create a strong password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control"
                       placeholder="Repeat your password" required autocomplete="new-password">
            </div>

            <button type="submit" class="auth-btn">Create Account</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-links">
            <a href="{{ route('login') }}">Already have an account? Sign in</a>
        </div>
    </div>
@endsection