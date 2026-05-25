@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-icon">
                <i class="fas fa-lock"></i>
            </div>
            <span class="auth-brand-text">Template Admin</span>
        </div>

        <h1 class="auth-heading">Forgot Password?</h1>
        <p class="auth-subtitle">Enter your email address and we'll send you a link to reset your password.</p>

        @if (session('status'))
            <div class="auth-alert auth-alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="auth-alert auth-alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            <button type="submit" class="auth-btn">Send Reset Link</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-links">
            <a href="{{ route('login') }}">Back to sign in</a>
        </div>
    </div>
@endsection