@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <span class="auth-brand-text">Template Admin</span>
        </div>

        <h1 class="auth-heading">Welcome Back</h1>
        <p class="auth-subtitle">Sign in to your account to continue</p>

        @if (session('error'))
            <div class="auth-alert auth-alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="auth-alert auth-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="auth-field">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="you@example.com" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter your password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-checkbox">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="auth-btn">Sign In</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-links">
            <a href="{{ route('password.request') }}">Forgot your password?</a>
            <br>
            <a href="{{ route('register') }}">Create an account</a>
        </div>
    </div>
@endsection