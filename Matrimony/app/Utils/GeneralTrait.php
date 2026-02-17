<?php
namespace App\Utils;

use App\Exceptions\DefinedFault;
use App\Models\IssueType;
use App\Models\Member;
use App\Models\Notification;
use App\Models\Permission;
use App\Models\Privilege;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\TicketActivity;
use App\Models\User;
use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\UserOtpVerify;

trait GeneralTrait
{
	public function getRoutes($userRoleId){
        $routesArray = [];
	    $privilagesList = Permission::where('role_id', $userRoleId)
        ->join('routes', 'routes.id', '=', 'permissions.route_id')
        ->select('routes.name')
        ->get();
        foreach($privilagesList as $privilageData){
            array_push($routesArray, $privilageData->name);
        }
        return $routesArray;
	}
	public function getMember($id){
	    $member = Member::where('id', intval($id))->first();
        return $member;
	}


    public function getSettingsKeyValue($key)
    {
        $rowVal =  Setting::where('key', $key)->first();
        if($rowVal){
            if($key == 'pagination_count'){
                $rowValCount = intval($rowVal->value);
                if($rowValCount > 50){
                throw new DefinedFault('Pagination limit exceed.');
                }
            }
            return $rowVal->value;
        }else{
            return null;
        }
    }

    public function ccMailValue()
    {
        $allMails = Setting::where('key', 'cc-mails')->first();
        if($allMails){
            $ccmailArrayVal = explode(",",$allMails->value);
            return $ccmailArrayVal;
        }else{
            return null;
        }
    }

    public function getStartDate($from_date)
    {
        $now = Carbon::now();
        return Carbon::parse($from_date ?? $now->copy()->subDays(7)->format('Y-m-d'))->startOfDay();
    }

    public function getEndDate($to_date)
    {
        $now = Carbon::now();
        return Carbon::parse($to_date ?? $now->format("Y-m-d"))->endOfDay();
    }

    public function oneMonthAgo()
    {

        $rowVal =  Setting::where('key', 'search_date')->first();
        if($rowVal){
            $date_val = $rowVal->value;
            if($date_val != 0){
                return $date_val;
            }else{
                return Carbon::now()->subMonth()->startOfDay()->format("Y-m-d");
            }
        }else{
            return Carbon::now()->subMonth()->startOfDay()->format("Y-m-d");
        }

    }

    public function maskMobileNumber($mobile)
    {
        return strlen($mobile) > 5 ? substr($mobile, 0, 2) . str_repeat('*', strlen($mobile) - 5) . substr($mobile, -3) : $mobile;
    }

    public function maskEmail($email)
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

    private function goldStageNameAlter($glLeads)
    {
        $glLeads->transform(function ($item) {
            $lead_stage = $item->lead_stage;

            $lead_stage = str_replace('GL General -', '', $lead_stage);

            $lead_stage = str_replace('_', ' ', $lead_stage);

            $lead_stage = str_replace('Gold Loan', '', $lead_stage);

            $lead_stage = strtolower($lead_stage);

            $lead_stage = ucwords(trim($lead_stage));

            $item->lead_stage = $lead_stage;
            return $item;
        });
    }

    public function aes_encrypt($ecryptData)
    {
        try {
            $data = $ecryptData;
            $password = env('AES_ENC_KEY');
            $iv = env('AES_ENC_IV');
            $method_aes = env('AES_ENC_METHOD');

            $encrypted = openssl_encrypt($data, $method_aes, $password, 0, $iv);
            $encryptedData = base64_encode($encrypted);

            return $encryptedData;
        } catch (\Throwable $e) {
            Log::info('Exception' . $e->getMessage());

        }
    }


    public function aes_decrypt($encryptedData)
    {
        try {
            $password = env('AES_ENC_KEY');
            $iv = env('AES_ENC_IV');
            $method_aes = env('AES_ENC_METHOD');

            $cipher = base64_decode($encryptedData);

            $decrypted = openssl_decrypt($cipher, $method_aes, $password, OPENSSL_RAW_DATA, $iv);

            return $decrypted;
        } catch (\Exception $e) {
            Log::info('Exception' . $e->getMessage());
        }
    }
    public function blowfish_decrypt($encryptedData)
    {
        try {
            $password = env('ENC_KEY');
            $iv = env('ENC_IV');
            $method_blowfish = env('ENC_METHOD');

            $cipher = base64_decode($encryptedData);

            $decryptedData = openssl_decrypt($cipher, $method_blowfish, $password, $options = OPENSSL_RAW_DATA, $iv);

            return $decryptedData;
        } catch (\Exception $e) {
            Log::info('Exception: ' . $e->getMessage());
            return null;
        }
    }
    public function custom_encrypt($data){
        $value = Crypt::encrypt($data);
        return $value;

    }


    public function custom_decrypt($data){
        $dencryptedData = Crypt::decrypt($data);
        return $dencryptedData;
    }

    public function generateTicketToken()
    {
        $datePart = Carbon::now()->format('dmy');

        $randomString = $this->generateRandomString(4);

        $token = $datePart . strtoupper($randomString);

        return $token;
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function getAuthUser()
    {
        return Auth::user();
    }
    public function getSessionPopupFlush()
    {
        session()->forget('sucess_model');
        session()->forget('error_model');
        session()->forget('warning_model');
        session()->forget('comment_add');

    }



    public function getUserRole($usetId)
    {
        $userRole = User::where('id', $usetId)->first();
        $roleName = Role::where('id', $userRole->role_id)->first();
        return $roleName->name;
    }


    public static function generateRandomOtp($id)
    {
        do {
            $randomotp = rand(100000, 999999);
        } while (UserOtpVerify::where(['user_id'=> $id, 'otp_code' => $randomotp])->exists());

        return intVal($randomotp);
    }

    function getDeveloperName($id){
        $users = User::where('id', $id)->first();
        return $users->username;
    }

}
