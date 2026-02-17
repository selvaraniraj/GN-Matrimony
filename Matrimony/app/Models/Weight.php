<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    protected $table = 'weights';

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
        return $this->hasMany(MemberAddionalDetail::class, 'weight_id');
    }

    public function partnerInformation()
    {
        return $this->hasMany(PartnerInformation::class, 'weight_id');
    }
}
