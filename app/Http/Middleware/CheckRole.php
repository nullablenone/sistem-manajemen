<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user(); // Ambil pengguna yang sedang login

            // Cek apakah pengguna adalah super admin
            if ($user->role !== 'super admin') { // Pastikan peran sesuai
                return redirect()->back(); // Berikan pesan error
            }

            return $next($request); // Lanjutkan request jika super admin
        }

        // Jika pengguna tidak login, redirect ke halaman login
        return redirect()->back();
    }
}
