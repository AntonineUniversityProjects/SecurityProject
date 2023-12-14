<?php
namespace App\Http\Middleware;

use Closure;

class CspMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Set Content Security Policy header
        $response->header(
            'Content-Security-Policy',
            'default-src \'self\'; script-src \'self\' https://cdn.example.com'
        );

        return $response;
    }
}
