<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login'); // Redirect to login if not authenticated
        }

        // Check the role of the user
        if ($role == 'admin' && Auth::user()->usertype == 1) {
            return $next($request);  // Proceed if user is admin
        }

        if ($role == 'client' && Auth::user()->usertype == 0) {
            return $next($request);  // Proceed if user is client
        }

        // Access restricted message
        return redirect('login')->with('error', 'Access restricted to ' . ucfirst($role) . 's only.');
    }
}
