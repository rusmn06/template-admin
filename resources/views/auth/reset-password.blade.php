@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Reset Your Password</h1>
                                <p class="mb-4">Enter your new password below.</p>
                            </div>

                            <!-- Error Message -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user" method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <!-- Hidden Inputs: Token & Email (Wajib ada) -->
                                <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">
                                <input type="hidden" name="email" value="{{ $email ?? request()->query('email') }}">

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" 
                                           value="{{ old('email', $email ?? request()->query('email')) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           placeholder="New Password" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                           placeholder="Confirm New Password" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Reset Password
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection