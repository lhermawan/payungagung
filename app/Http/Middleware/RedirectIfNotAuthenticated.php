<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user belum login, arahkan ke halaman '/'
        if (!Auth::check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
