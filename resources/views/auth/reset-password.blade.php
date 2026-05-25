@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-icon">
                <i class="fas fa-key"></i>
            </div>
            <span class="auth-brand-text">Template Admin</span>
        </div>

        <h1 class="auth-heading">Reset Your Password</h1>
        <p class="auth-subtitle">Choose a new password for your account.</p>

        @if ($errors->any())
            <div class="auth-alert auth-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">
            <input type="hidden" name="email" value="{{ $email ?? request()->query('email') }}">

            <div class="auth-field">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control"
                       value="{{ old('email', $email ?? request()->query('email')) }}" readonly>
            </div>

            <div class="auth-field">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter new password" required autocomplete="new-password" autofocus>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control"
                       placeholder="Repeat new password" required autocomplete="new-password">
            </div>

            <button type="submit" class="auth-btn">Reset Password</button>
        </form>

        <hr class="auth-divider">

        <div class="auth-links">
            <a href="{{ route('login') }}">Back to sign in</a>
        </div>
    </div>
@endsection