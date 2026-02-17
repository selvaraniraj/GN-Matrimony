<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
                    ->where('is_active', 1)
                    ->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        //  DELETE OLD TOKENS (App close / relogin logic)
        $user->tokens()->delete();

        //  CREATE NEW TOKEN
        $token = $user->createToken('mobile-app')->plainTextToken;

        $member = Member::where('user_id', $user->id)->first();

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
            'member_id' => $member?->id
        ]);
    }

    // LOGOUT
 public function logout(Request $request)
{
    if (!$request->user()) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid or missing token'
        ], 401);
    }

    if ($request->user()->currentAccessToken()) {
        $request->user()->currentAccessToken()->delete();
    }

    return response()->json([
        'status' => true,
        'message' => 'Logout successful'
    ]);
}


}
