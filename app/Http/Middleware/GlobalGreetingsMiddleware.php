<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GlobalGreetingsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Get the current time in Africa/Nairobi timezone
        $currentTime = Carbon::now('Africa/Nairobi');
        $hour = $currentTime->hour;

        // Determine the greeting based on the time of day
        $greeting = '';
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good Morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good Afternoon';
        } else {
            $greeting = 'Good Evening';
        }

        $lastname = 'Guest'; // Default to 'Guest'
        if (Auth::check()) {
            $user = Auth::user();
            $lastname = $user->lastname; // Only access the user's last name if authenticated
        }

        // Share the variables with all views
        view()->share([
            'greeting' => $greeting,
            'lastname' => $lastname,
        ]);

        return $next($request);
    }
}

