<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticate
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

        if (!empty($token) && $token === auth()->user()->api_token->token) {
            return $next($request);
        }

        return response()->json(['message' => 'API token expired or not found'], 401);
    }
}
