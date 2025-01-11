<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the 'api_key' header is present in the request
        if (!$request->hasHeader('api_key')) {
            return new JsonResponse(['error' => 'Please enter your api_key'], 401);
        }

        // Retrieve the 'api_key' value from the request headers
        $apiKey = $request->header('api_key');

        // Perform additional checks or validations for the 'api_key' here
        // For example, you might want to verify the API key against a database or configuration file.

        // Continue processing the request
        return $next($request);
    }
}
