<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;

    protected $table = 'education_details';

    protected $fillable = [
        'education_id',
        'member_id',
        'state_id',
        'city_id',
        'taulk_id',
        'college_inst',
        'organization',
        'employee_in',
        'occuption',
        'company_name',
        'destination',
        'income',
        'pincode',
        'address',
        'passport_number',
        'visa_type',
        'other_country_address',
        'location',
        'mark_percentage',
        'completed_year',
        'medium',
        'is_active',
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function memberEducation($id)
    {
        $dataArray = EducationDetail::where('member_id', $id)
                        ->where('status', 1)
                        ->get();
    
        return $dataArray->isNotEmpty() ? $dataArray->toArray() : [];
    }
}
