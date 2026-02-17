<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    protected $table = 'occupations';

    protected $fillable = [
        'name',
        'year_income',
        'is_active',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setYearIncomeAttribute($value)
    {
        $this->attributes['year_income'] = $value;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function partnerInformation()
    {
        return $this->hasMany(PartnerInformation::class, 'occupation_id');
    }
}
