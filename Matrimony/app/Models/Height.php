<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    use HasFactory;

    protected $table = 'heights';

    protected $fillable = [
        'name',
        'is_active',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function memberDetails()
    {
        return $this->hasMany(MemberAddionalDetail::class, 'height_id');
    }

    public function partnerInformation()
    {
        return $this->hasMany(PartnerInformation::class, 'height_id');
    }
}
