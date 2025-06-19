<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('logged_in_user')) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized. Please log in.'], 401);
            }

            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
