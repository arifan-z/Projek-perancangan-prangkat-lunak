<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Belum login → redirect ke login
            return redirect()->route('login.form');
        }

        $user = Auth::user();

        // Role tidak cocok
        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak: Anda tidak memiliki hak untuk halaman ini.');
        }

        return $next($request);
    }
}
