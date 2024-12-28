<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Auth::logout();
        if (!Auth::check()) {
      
            // Redirect to login page if unauthenticated
            return redirect()->route('admin.login')->with('error', 'Please login to access this page.');
        }

        return $next($request);
    }
}