<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedStatus extends Model
{
    use HasFactory;

    protected $table = 'liked_statuses';

    protected $fillable = [
        'member_id',
        'profile_id',
        'verify_flag',
        'reason',
        'contact_status',
        'marriage_date',
        'is_active',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function profile()
    {
        return $this->belongsTo(Member::class, 'profile_id');
    }
}
