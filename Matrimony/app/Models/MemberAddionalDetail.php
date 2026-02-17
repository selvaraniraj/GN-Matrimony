<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberAddionalDetail extends Model
{
    use HasFactory;

    protected $table = 'member_addional_details';

    protected $fillable = [
        'member_id',
        'body_type',
        'height_id',
        'weight_id',
        'disablitiy',
        'eating_habit',
        'drinking_habit',
        'smoking_habit',
        'about_you',
        'is_active',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function height()
    {
        return $this->belongsTo(Height::class);
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
