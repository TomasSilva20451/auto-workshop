<?php

namespace App\Http\Middleware;

use Closure;

class CustomCorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $allowedOrigins = [
            'http://localhost:5173',
            'http://localhost:3000',
        ];

        if (in_array($request->header('Origin'), $allowedOrigins)) {
            $response->headers->set('Access-Control-Allow-Origin', $request->header('Origin'));
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-XSRF-TOKEN, x-xsrf-token');
        }

        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');

        return $response;
    }
}