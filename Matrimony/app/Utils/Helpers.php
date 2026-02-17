<?php

use App\Models\DeveloperTicket;
use App\Models\IssueType;
use App\Models\Privilege;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Ticket;
use App\Exceptions\SuccessResponse;
use App\Exceptions\DefinedFault;
use App\Exceptions\Support\ErrorCodeHandler;
use App\Models\Permission;
use Illuminate\Support\Facades\Cache;
    function getAssignees(){
        return User::where('role_id',10)->select('id','name','email')->get()->toArray();
    }
    function getRoutesList(){
        $userRoleId = Auth::user()->role_id;
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

    if (!function_exists('getSettingsKeyValue')) {
        function getSettingsKeyValue($key)
        {
            return Setting::where('key', $key)->first();
        }
    }
    if (!function_exists('ccMailValue')) {
        function ccMailValue($key)
        {
            $allMails = Setting::where('key', 'ccmails')->first();
            $ccmailArrayVal = explode(",",$allMails);
            return $ccmailArrayVal;

        }
    }

    function getRole(){
        $userRoleId = Auth::user()->role_id;
        $roleName = Role::where('id', $userRoleId)->first();
        return $roleName->name;
    }

    function getDeveloperList(){
        $users = User::where(['is_active' => 1, 'role_id' => 6])->pluck('username', 'id');
        return $users;
    }

    function nameMerge($firstName, $lastName)
    {
        if($firstName != null || $lastName != null){
            $first_name = $firstName ?? '';
            $last_name = $lastName ?? '';
            $fullName = $first_name.' '.$last_name;
        }else{
            $fullName = 'N/A';
        }
        return $fullName;
    }

    function formatDate($dateTimeString) {
        $now = new DateTime();
        $createdAt = new DateTime($dateTimeString);

        if ($now->format('Y-m-d') === $createdAt->format('Y-m-d')) {
            return $createdAt->format('h:i A');
        } else {
            return $createdAt->format('j/n/y h:i A');
        }
    }

    function getPermissions()
    {
        $cachePermissions = Redis::get('PERMISSIONS:' . Auth::user()->id);
        if (isset($cachePermissions)) {
            $rolePermission = json_decode($cachePermissions, false);
        } else {
            $permissions = Auth::user()->permissions;
            $rolePermission = [];
            if (empty($permissions) === false) {
                foreach ($permissions as $permission) {
                    $rolePermission[] = $permission->slug;
                }
            }
        }
        return $rolePermission;
    }

    function maskPhoneNo($phoneNo)
    {
        if (is_numeric($phoneNo)) {
            return strlen($phoneNo) > 5 ? substr($phoneNo, 0, 2) . str_repeat('*', strlen($phoneNo) - 5) . substr($phoneNo, -3) : $phoneNo;
        }

        return null;
    }
    if (!function_exists('formatFileSize')) {
        function formatFileSize($size)
        {
            if($size != null){
                if ($size < 1024) {
                    return $size . ' B';
                } elseif ($size < 1048576) {
                    return number_format($size / 1024, 2) . ' KB';
                } else {
                    return number_format($size / 1048576, 2) . ' MB';
                }
            }else{
                return null;
            }

        }
    }

    function maskIp($ip, $digitsToMask = 2)
    {
        // Validate the number of digits to mask
        if ($digitsToMask <= 0) {
            throw new InvalidArgumentException('Number of digits to mask should be greater than 0.');
        }

        // Validate the IP address format
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException('Invalid IP address format.');
        }

        // Convert the IP address to an array of octets
        $octets = explode('.', $ip);

        // Calculate the index to start masking from
        $startIndex = max(0, count($octets) - $digitsToMask);

        // Mask the specified number of digits
        for ($i = $startIndex; $i < count($octets); $i++) {
            $octets[$i] = 'xxx';
        }

        // Join the masked octets back into an IP address
        $maskedIp = implode('.', $octets);

        return $maskedIp;
    }
    function maskNumber($value) {
        return strlen($value) > 5 ? substr($value, 0, 2) . str_repeat('*', strlen($value) - 5) . substr($value, -3) : $value;
    }

    function stageValueFind($stage_id, $product_id){
        $stage = DB::connection('mysql_sfl')
                    ->table('stage_master')
                    ->where(['stage_id' => $stage_id, 'product_id' => $product_id])
                    ->first();

        if ($stage) {
            return $stage->desc;
        } else {
            return null;
        }
    }

    function paginationSerial($list,$loopIteration){
        return ($list->currentPage() - 1) * $list->perPage() + $loopIteration;
    }
    function custom_encrypt($data){
        $value = Crypt::encrypt($data);
        return $value;

    }
    function custom_encryptString($data){
        $modifiedPath = str_replace('/storage', 'app', $data);
        $value = Crypt::encryptString($modifiedPath);
        return $value;

    }

    function blowfish_encrypt($data)
    {
        try {
            $password = env('ENC_KEY');
            $iv = env('ENC_IV');
            $method_blowfish = env('ENC_METHOD');

            $cipher = openssl_encrypt($data, $method_blowfish, $password, $options = OPENSSL_RAW_DATA, $iv);

            $encryptedData = base64_encode($cipher);

            return $encryptedData;
        } catch (\Exception $e) {
            Log::info('Exception: ' . $e->getMessage());
            return null;
        }
    }

    function blowfish_decrypt($encryptedData)
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

    function aes_decrypt($encryptedData)
    {
        try {
            $password = env('ENC_KEY');
            $iv = env('ENC_IV');
            $method_aes = env('ENC_METHOD');

            $cipher = base64_decode($encryptedData);

            $decrypted = openssl_decrypt($cipher, $method_aes, $password, OPENSSL_RAW_DATA, $iv);

            return $decrypted;
        } catch (\Exception $e) {
            Log::info('Exception' . $e->getMessage());
        }
    }
    function aes_encrypt($plainText)
    {
        try {
            $password = env('ENC_KEY');
            $iv = env('ENC_IV');
            $method_aes = env('ENC_METHOD');

            $encrypted = openssl_encrypt($plainText, $method_aes, $password, OPENSSL_RAW_DATA, $iv);

            $cipher = base64_encode($encrypted);

            return $cipher;
        } catch (\Exception $e) {
            Log::info('Exception: ' . $e->getMessage());
            return false;
        }
    }

    if (!function_exists('formatIndianCurrency')) {
        function formatIndianCurrency($amount)
        {
            $fmt = new \NumberFormatter('en_IN', \NumberFormatter::CURRENCY);
            return $fmt->formatCurrency($amount, 'INR');
        }
    }


    function getDeveloperName($id){
        $users = User::where('id', $id)->first();
        return $users->username;
    }

    if (!function_exists('maskMobileNo')) {
        function maskMobileNo($phoneNo)
            {
                if (is_numeric($phoneNo) && $phoneNo != null) {
                    return substr($phoneNo, 0, 2) . str_repeat('*', strlen($phoneNo) - 5) . substr($phoneNo, -3);
                }
                return null;
            }
    }

    if (! function_exists('isDead')) {
        function isDead($value): bool
        {
            if (isset($value) && $value === 0) {
                return false;
            }
            if ($value === '0') {
                return false;
            }

            return empty($value);
        }
    }

    function custom_label($for, $text) {
        return '<label for="' . $for . '" class="form-label">' . $text . '</label>';
    }
