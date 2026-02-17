<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_log extends Model
{
    use HasFactory;

    protected $table = 'user_log';

    protected $fillable = [
        'member_id',
        'profile_id',
        'create_date',
        'message',
        'flag',
        'upprove_date',
        'upproved_by',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function profile()
    {
        return $this->belongsTo(Member::class, 'profile_id', 'id');
    }
}
