<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtpVerify extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'user_otp_verifies';
    protected $fillable = ['user_id','otp_code','otp_type','delivery_time','delivery_status','otp_verify_status','otp_verified_time', 'page_expired', 'otp_expired'];
}
