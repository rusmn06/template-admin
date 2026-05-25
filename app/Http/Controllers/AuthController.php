<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Buat User baru
        // Role otomatis 'user' karena default di migration, 
        // tapi kita bisa set eksplisit jika perlu.
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // Otomatis hashed oleh cast di Model
            'role' => 'user',
        ]);

        // 3. Login langsung setelah register (opsional, tapi UX bagus)
        Auth::login($user);

        // 4. Redirect
        return redirect()->route('dashboard');
    }

    // Menampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Attempt Login (Coba login)
        // Auth::attempt akan mencari user di DB & verifikasi password (hash check)
        if (Auth::attempt($credentials, $request->filled('remember'))) {

            // Regenerate session untuk keamanan (mencegah session fixation attack)
            $request->session()->regenerate();

            // 3. Redirect berdasarkan role
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('dashboard'));
        }

        // 4. Jika gagal login
        // Kirim error ke view dengan key 'email' (standar Laravel)
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Logout user (hapus informasi auth dari session)
        Auth::logout();

        // 2. Invalidate session (hapus session lama sama sekali)
        $request->session()->invalidate();

        // 3. Regenerate CSRF token (keamanan)
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman login
        return redirect()->route('login');
    }

    // 1. Tampilkan Form Forgot Password
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // 2. Kirim Link Reset
    public function sendResetLink(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Kirim link reset menggunakan Laravel Password Broker
        $status = Password::sendResetLink($request->only('email'));

        // Respon berdasarkan hasil pengiriman
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status)) // Kirim pesan sukses
            : back()->withErrors(['email' => __($status)]); // Kirim pesan error
    }

    // 1. Tampilkan Form Reset Password
    public function showResetPassword(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email') // Ambil email dari URL
        ]);
    }

    // 2. Proses Update Password
    public function resetPassword(Request $request)
    {
    // 1. Validasi Input
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    // 2. Gunakan Laravel Password Broker untuk reset
    // Ini akan otomatis cek token, email, dan update password di DB
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password) // Atau $password jika model punya cast hashed
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    // 3. Respon
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status)) // Sukses -> ke login
                : back()->withErrors(['email' => [__($status)]]); // Gagal -> kembali ke form
    }

}
