<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ForgotPasswordSendAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use App\Utils\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserOtpVerifySendMail;
use App\Models\UserOtpVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use GeneralTrait;

    public function register_page()
    {

        return view('auth.register');

    }
    public function landing_page()
    {
        return view('auth.association');

    }
    

    public function login_page()
    {
        if (Auth::check()) {
            if(Auth::user()->role_id == 3){
                return redirect()->route('app.v2.landing_page');
            }
            return redirect(route('app.main.dashboard'));
        }else{
            return redirect(route('app.v2.loginPage_page'));
        }
    }


    public function register(AddUserRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 3,
        ]);

  return redirect(route('login'))->with('success', 'Account created successfully. Please login.');
    }

    public function admin_register(AddUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);




        return redirect(route('login'))->with('success', 'Account created successfully. Please login.');
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'password' => $request->get('password'),
        ];

        if (str_contains($request->email, "@")) {
            $credentials['email'] = $request->get('email');
        } else {
            $credentials['username'] = $request->get('email');
        }

        $user = User::where('email', $request->email)->orWhere('username', $request->email)->first();

        if ($user) {
            // Convert last_failed_attempt to Carbon instance
            $lastFailedAttempt = $user->last_failed_attempt ? Carbon::parse($user->last_failed_attempt) : null;

            if ($user->password_expired && $lastFailedAttempt && $lastFailedAttempt->diffInMinutes(Carbon::now()) < 15) {
                $minutesLeft = 15 - $lastFailedAttempt->diffInMinutes(Carbon::now());
                return redirect()->back()->with('error', "Your password has expired due to multiple incorrect attempts. Please try again after $minutesLeft minutes.");
            }

            if ($user->password_expired && $lastFailedAttempt && $lastFailedAttempt->diffInMinutes(Carbon::now()) >= 15) {
                $user->password_expired = false;
                $user->failed_attempts = 0;
                $user->save();
            }

            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                $userDetails = ['ID' => $user->id, 'name' => $user->name, 'username' => $user->username, 'email' => $user->email];

                if ($user->is_active) {
                    $user->failed_attempts = 0;
                    $user->save();

                    $request->session()->regenerate();

                    $user->last_login = Carbon::now();
                    $user->save();

                    if ($user->role_id == 8) {
                        return redirect()->route('app.v2.landing_page');
                    }

                    return redirect()->route('app.main.dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Invalid username or password, Please try again.');
                }
            } else {
                $user->failed_attempts += 1;
                $user->last_failed_attempt = Carbon::now();

                if ($user->failed_attempts >= 3) {
                    $user->password_expired = true;
                }

                $user->save();

                $chancesLeft = 3 - $user->failed_attempts;
                if ($chancesLeft <= 0) {
                    return redirect()->back()->with('error', 'Your password has expired due to multiple incorrect attempts. Please try again after 15 minutes.');
                }

                return redirect()->back()->with('error', 'Invalid username or password, Please try again.');
            }
        }

        return redirect()->back()->with('error', 'Invalid username or password, Please try again.');
    }



    public function logout(Request $request)
    {
        $user = Auth::user();
        $userDetaisls = ['ID' => $user->id, 'name' => $user->name, 'username' => $user->username, 'email' => $user->email];
        // return $userDetaisls;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'))->with('success', 'Logged out successfully.');
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function forgotPasswordMailSend(Request $request)
    {
        $user = User::where('email', $request->email)
                    ->orWhere('username', $request->email)
                    ->first();

        if ($user) {
            $now = Carbon::now();

            if ($user->send_otp_attemps >= 3 && $user->temp_otp_blocked_until) {
                $tempBlockedUntil = Carbon::parse($user->temp_otp_blocked_until);

                if ($now->greaterThanOrEqualTo($tempBlockedUntil)) {
                    $user->send_otp_attemps = 0;
                    $user->temp_otp_blocked_until = null;
                    $user->save();
                } else {
                    $timeUpdate = $tempBlockedUntil->diffInMinutes($now);
                    return redirect()->back()->with('error', "Your OTP attempt expired, Please try again after $timeUpdate minutes");
                }
            }

            UserOtpVerify::where('user_id', $user->id)
                ->update(['otp_expired' => 1]);

            $otp = $this->getUserOtpDetails($user->id, 'send');
            $getMailVerify = intval($this->getSettingsKeyValue('forgot-password-otp-mail-send'));

            if ($getMailVerify == 1) {
                if ($user->send_otp_attemps < 3) {
                    Mail::to($user->email)->send(new UserOtpVerifySendMail($user, $otp));
                    $user->send_otp_attemps += 1;

                    if ($user->send_otp_attemps == 3) {
                        $user->temp_otp_blocked_until = $now->addMinutes(15);
                    }

                    $user->save();
                } else {
                    return redirect()->back()->with('error', 'Your OTP attempt expired, Please try again after 15 minutes');
                }
            }

            return redirect(route('otpVerify', ['id' => $this->custom_encrypt($user->id)]))
                    ->with('success', 'OTP sent successfully to your given email');
        } else {
            return redirect()->back()->with('error', 'Invalid Email/Username');
        }
    }

    public function getUserOtpDetails($id, $type){
        $randomOtp= $this->generateRandomOtp($id);
        $time = Carbon::now()->format("Y-m-d H:i:s");
        $hashedOtpCode = Hash::make($randomOtp);
        if(!empty($randomOtp)){
            $ticket = UserOtpVerify::create([
                'user_id' => $id,
                'otp_code' => $randomOtp,
                'otp_type' => $type == 'send' ? 'send' : 'resend',
                'delivery_time' => $time,
                'delivery_status' =>1,
                'otp_verify_status' => 0,
                'otp_verified_time'=>NULL,
            ]);
            return $randomOtp;
        } else {
            return redirect()->back()->with('error', 'OTP generate failure');
        }
    }

    public function sendOtp($id){
        $request=request();
        $userId = $this->custom_decrypt($id);

        UserOtpVerify::where('user_id', $userId)
        ->update(['otp_expired' => 1]);
        return redirect(route('otpVerify', ['id' => $id]))
                    ->with('success', 'OTP send successfully to your given email');
    }

    public function resendOtp($id)
    {
        $request = request();
        $userId = $this->custom_decrypt($id);

        UserOtpVerify::where('user_id', $userId)
            ->update(['otp_expired' => 1]);

        $user = User::where('id', $userId)->first();

        if ($user->email) {
            $now = Carbon::now();

            if ($user->send_otp_attemps >= 3 && $user->temp_otp_blocked_until) {
                $tempBlockedUntil = Carbon::parse($user->temp_otp_blocked_until);

                if ($now->greaterThanOrEqualTo($tempBlockedUntil)) {
                    $user->send_otp_attemps = 0;
                    $user->temp_otp_blocked_until = null;
                    $user->save();
                } else {
                    $timeUpdate = $tempBlockedUntil->diffInMinutes($now);
                    return redirect()->back()->with('error', "Your OTP attempt expired, Please try again after $timeUpdate minutes");
                }
            }

            $otp = $this->getUserOtpDetails($user->id, 'resend');
            $getMailVerify = intval($this->getSettingsKeyValue('forgot-password-otp-mail-send'));

            if ($getMailVerify == 1) {
                if ($user->send_otp_attemps < 3) {
                    Mail::to($user->email)->send(new UserOtpVerifySendMail($user, $otp));
                    $user->send_otp_attemps += 1;

                    if ($user->send_otp_attemps == 3) {
                        $user->temp_otp_blocked_until = $now->addMinutes(15);
                    }

                    $user->save();
                } else {
                    return redirect()->back()->with('error', 'Your OTP attempt expired, Please try again after 15 minutes');
                }
            }

            return redirect(route('otpVerify', ['id' => $id]))
                    ->with('success', 'OTP resend successfully to your given email');
        } else {
            return redirect()->back()->with('error', 'Invalid Email ID, Please try again with valid email id');
        }
    }

    public function otpVerify($id){
        $userId = $this->custom_decrypt($id);
        $user = User::where('id', $userId)->first();
        $userEmail= $this->maskEmail($user->email);
        return view('auth.userOtpVerify', ['user'=>$user, 'userEmail' => $userEmail,'token'=>$id]);

    }

    public function verifyOtp(Request $request)
    {
        session()->forget('success');

        $this->validate($request, [
            'otp_code' => 'required|regex:/^\d{6}$/',
        ]);

        $reqOtpCode = intval($request->otp_code);
        $userId = $this->custom_decrypt($request->token);
        $otpData = UserOtpVerify::where('user_id', $userId)
                                ->orderByDesc('created_at')
                                ->first();
                                // return $otpData;

        if (!$otpData) {
            return redirect()->back()->with('error', 'Invalid User!');
        }

        $now = Carbon::now();
        $otpCreatedAt = Carbon::parse($otpData->created_at);

        if ($now->diffInMinutes($otpCreatedAt) >= 5) {
            return redirect()->back()->with('error', 'OTP has expired. Please resend OTP and proceed');
        }

        if ($reqOtpCode == $otpData->otp_code) {
            if ($otpData->otp_expired) {
                return redirect()->back()->with('error', 'OTP has expired. Please resend OTP and proceed');
            } else {
                $otpData->update([
                    'delivery_time' => $now,
                    'delivery_status' => 1,
                    'otp_verify_status' => 1,
                    'otp_verified_time' => $now,
                ]);

                return redirect(route('resetPassword', ['id' => $this->custom_encrypt($userId), 'token' => $otpData->id]))
                    ->with('success', 'OTP verified successfully. You can now set a new password.');
            }
        } else {

            if ($otpData->otp_invalid_attempts >= 3) {
                $otpData->otp_expired_attempts = ($otpData->otp_expired_attempts ?? 0) + 1;
                $otpData->otp_expired = 1;
                $otpData->save();

                return redirect()->back()->with('error', 'OTP has expired. Please resend OTP and proceed');
            } else {

                $otpData->otp_invalid_attempts = ($otpData->otp_invalid_attempts ?? 0) + 1;
                $otpData->save();
                // return $otpData;

                return redirect()->back()->with('error', 'Invalid OTP');
            }
        }
    }


    public function resetPassword($id, $token)
    {
        $userId = $this->custom_decrypt($id);
        $otpDetails = UserOtpVerify::find($token);

        if ($otpDetails->page_expired) {
            return redirect()->route('login')->with('error', 'Reset page expired, Please try again');
        }
        if ($otpDetails->otp_verified_time && now()->diffInMinutes($otpDetails->otp_verified_time) >= 5) {
            $otpDetails->update(['page_expired' => 1]);
            return redirect()->route('login')->with('error', 'Reset page expired, Please try again');
        }

        $userData = User::find($userId);
        return view('auth.forgetPasswordLink', [
            'user' => $userData,
            'token' => $this->custom_encrypt($userId),
            'otpToken' => $token
        ]);
    }

    public function submitResetPasswordForm(ResetPasswordRequest $request)
    {
        $userId = $this->custom_decrypt($request['token']);

        $user = User::find($userId);

        if (Hash::check($request['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Current password does not accept new password, try again.']);
        }else{
            $user = User::where('id', $userId)->update([
                'password' =>bcrypt($request ->password),
                'failed_attempts' => 0,
                'password_expired' => false
            ]);
        }

        if($user === 1){
            $otpDetails = UserOtpVerify::find($request['otp_id']);
            $otpDetails->update(['page_expired' => 1]);

            return redirect()->route('login')->with('success', 'Your password has been changed!');
        }
        else{
            return redirect()->route('resetPasswordSubmit')->with('error', 'Your password is not changed!');
        }
    }

    private function maskEmail($email)
    {
        if (empty($email)) {
            return $email;
        }
        $emailParts = explode('@', $email);
        $localPart = $emailParts[0];
        $domainPart = $emailParts[1];
        $maskedLocal = substr($localPart, 0, 1) . str_repeat('*', max(strlen($localPart) - 2, 1)) . substr($localPart, -1);
        $domainParts = explode('.', $domainPart);
        $maskedDomain = substr($domainParts[0], 0, 1) . str_repeat('*', max(strlen($domainParts[0]) - 2, 1)) . substr($domainParts[0], -1) . '.' . $domainParts[1];
        return $maskedLocal . '@' . $maskedDomain;
    }

}
