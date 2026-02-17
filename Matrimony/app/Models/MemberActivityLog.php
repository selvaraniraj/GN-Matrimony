<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberActivityLog extends Model
{
    use HasFactory;

    protected $table = 'member_activity_logs';

    protected $fillable = [
        'member_id',
        'body_type',
        'profile_id',
        'flag',
        'message',
        'upprove_date',
        'user_id',
        'status',
        'upproved_by'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function profile()
    {
        return $this->belongsTo(Member::class, 'profile_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

       public static function mobileRequestPending($profileId, $logId)
    {
        return self::where('member_id', $logId)
            ->where('profile_id', $profileId)
            ->where('flag', 2)
            ->exists();
    }

    public function scopeByProfileAndFlag($query, $profileId, $flag = 2)
    {
        return $query->where('profile_id', $profileId)->where('flag', $flag);
    }
}

