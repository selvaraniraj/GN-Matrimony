<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Member;

class VerifyApiToken
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user(); // from auth:sanctum

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
                'data' => null
            ], 401);
        }

        $member = Member::where('user_id', $user->id)->first();

        if (!$member) {
            return response()->json([
                'status' => false,
                'message' => 'Member profile not found',
                'data' => null
            ], 404);
        }

        // 🔥 Attach member to request
        $request->merge(['member' => $member]);

        return $next($request);
    }
}
