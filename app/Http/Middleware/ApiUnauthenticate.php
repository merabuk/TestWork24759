<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiUnauthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('token');
        if (empty($token)) {
            $token = $request->input('token');
        }
        if (empty($token)) {
            $token = $request->bearerToken();
        }

        if (!empty($token)) {
            return response()->json(['message' => 'You are allready login, do something to redirect'], 201);
        }

        return $next($request);
    }
}
