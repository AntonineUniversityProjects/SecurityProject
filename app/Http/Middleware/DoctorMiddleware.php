<?php

// app/Http/Middleware/DoctorMiddleware.php

namespace App\Http\Middleware;

use Closure;

class DoctorMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role !== 'doctor') {
            return redirect()->route('unauthorized'); // Change to your unauthorized route
        }

        return $next($request);
    }
}
