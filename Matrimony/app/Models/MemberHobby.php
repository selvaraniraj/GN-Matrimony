<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberHobby extends Model
{
    use HasFactory;

    protected $table = 'member_hobbies';

    protected $fillable = [
        'member_id',
        'hobbies',
        'otherhobbies',
        'music',
        'othermusic',
        'sports',
        'othersports',
        'is_active',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function hobby()
    {
        return $this->belongsTo(Hobby::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
