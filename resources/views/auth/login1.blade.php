<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Sedikit style dasar agar tidak terlihat terlalu polos -->
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f3f4f6; }
        .login-box { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        input[type="email"], input[type="password"] { width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; background-color: #2563eb; color: white; padding: 0.75rem; border: none; border-radius: 4px; cursor: pointer; font-weight: 600; }
        button:hover { background-color: #1d4ed8; }
        .error { color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem; }
        .alert-danger { background-color: #fee2e2; color: #b91c1c; padding: 0.75rem; border-radius: 4px; margin-bottom: 1rem; border: 1px solid #fecaca; }
        .link { text-align: center; margin-top: 1rem; font-size: 0.875rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="text-align: center; margin-bottom: 1.5rem;">Login</h2>

        <!-- 1. Blok untuk menampilkan error umum (dari Controller) -->
        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- 2. Blok untuk menampilkan error validasi (jika ada) -->
        @if ($errors->any())
            <div class="alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <!-- value="{{ old('email') }}" agar input terisi kembali jika gagal login -->
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                
                <!-- Error spesifik untuk field email -->
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" style="margin-bottom: 0;">Remember Me</label>
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="link">
            Belum punya akun? <a href="{{ route('register') }}">Register di sini</a>
        </div>
    </div>
</body>
</html>