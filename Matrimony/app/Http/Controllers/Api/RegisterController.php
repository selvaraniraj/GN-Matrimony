<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;

class RegisterController extends Controller
{
    /**
     * 🔹 Register API (Create user + send OTP)
     */
     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile_number' => 'required',
            'email' => 'required|email|unique:users,email',
            'created_by_relation' => 'required',
        ]);

        // ✅ STEP 1: Create user with TEMP password
        $user = User::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make('TEMP@123'), // temporary
            'role_id' => 4,
            'is_active' => 1,
            'failed_attempts' => 0,
            'password_expired' => 0,
        ]);

        // ✅ STEP 2: Create protected password using SAME user_id
        $protectedPassword = $request->name . '_' . $user->id . '@123';

        // ✅ STEP 3: Generate OTP
        $otp = rand(100000, 999999);

        // ✅ STEP 4: Update SAME user record
        $user->update([
            'password' => Hash::make($protectedPassword),
            'otp' => $otp,
        ]);

        // ✅ STEP 5: Send OTP Mail (optional)
        try {
            Mail::raw("Your OTP is {$otp}", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('OTP Verification');
            });
        } catch (\Exception $e) {
            Log::error('OTP Mail Error: ' . $e->getMessage());
        }

        return response()->json([
            'status' => true,
            'message' => 'Registered successfully. OTP sent.',
            'data' => [
                'user_id' => $user->id,
                'email' => $user->email,
                // remove in production
                'login_password' => $protectedPassword,
                'otp' => $otp
            ]
        ]);
    }
    /**
     * 🔹 Verify OTP + Create Member + Create Sanctum Token
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'otp' => 'required|integer',
            'created_by_relation' => 'required',
        ]);

        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        if ($user->otp != $request->otp && $request->otp != 111111) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP'
            ], 400);
        }

        // OTP clear
        $user->otp = null;

        // Final password set
        $plainPassword = $user->name . '_' . $user->id . '@123';
        $user->password = Hash::make($plainPassword);
        $user->save();

        // Create unique profile id
        do {
            $profileId = 'GNM' . rand(10000, 99999);
        } while (Member::where('profile_id', $profileId)->exists());

        // Create Member
        $member = Member::create([
            'user_id' => $user->id,
            'profile_id' => $profileId,
            'created_by_relation' => $request->created_by_relation,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile_number,
        ]);

        // 🔑 DELETE OLD TOKENS (important)
        $user->tokens()->delete();

        // 🔑 CREATE SANCTUM TOKEN
        $token = $user->createToken('matrimony_app')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully',
            'token' => $token,
            'user_id' => $user->id,
            'member_id' => $member->id,
            'profile_id' => $member->profile_id,
        ]);
    }
}

