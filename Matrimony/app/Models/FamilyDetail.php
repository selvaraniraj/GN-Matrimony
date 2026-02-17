<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    use HasFactory;

    protected $table = 'family_details';

    protected $fillable = [
        'member_id',
        'family_status',
        'family_type',
        'family_values',
        'father_name',
        'father_status',
        'mother_name',
        'mother_status',
        'number_of_brothers',
        'brothers_married',
        'number_of_sisters',
        'sisters_married',
        'parent_contact_number',
        'ancestral_origin',
        'family_locations',
        'is_active',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
