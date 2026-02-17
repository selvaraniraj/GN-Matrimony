<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'Token not provided'
            ], 401);
        }

        $user = DB::table('users')
            ->where('remember_token', $token)
            ->where('is_active', 1)
            ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired token'
            ], 401);
        }

        // attach logged user (avoid InputBag scalar constraint)
        $request->attributes->set('auth_user', $user);

        return $next($request);
    }
}
