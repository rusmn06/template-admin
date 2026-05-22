<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Sudah login DAN role-nya admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Silahkan lewat
        }

        // Kalau bukan admin, tendang ke halaman dashboard user biasa
        // Atau bisa juga abort(403) untuk 'Forbidden'
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses Admin.');
    }
}