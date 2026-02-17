<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosamDetail extends Model
{
    use HasFactory;

    protected $table = 'dosam_details';

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

    public function partnerInformation()
    {
        return $this->hasMany(PartnerInformation::class, 'dosam_id');
    }
}
