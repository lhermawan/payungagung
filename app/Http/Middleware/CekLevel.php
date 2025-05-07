<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Check if the user's level is in the allowed levels
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }
        
        // Redirect to the homepage if the user's level is not allowed
        return redirect('/login');
    }
}
