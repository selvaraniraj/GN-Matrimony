<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedProfile extends Model
{
    use HasFactory;

    protected $table = 'liked_profiles';

    protected $fillable = [
        'member_id',
        'liked_profile',
        'liked_flag',
        'unliked_profile',
        'unliked_flag',
        'is_active',
        'flag',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function likedMember()
    {
        return $this->belongsTo(Member::class, 'liked_profile');
    }

    public function unlikedMember()
    {
        return $this->belongsTo(Member::class, 'unliked_profile');
    }
}
