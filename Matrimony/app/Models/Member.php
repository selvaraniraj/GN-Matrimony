<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'profile_id',
        'association_id',
        'profile_created_by',
        'raasi_id ',
        'star_id ',
        'permanent_state_id',
        'permanent_city_id',
        'permanent_taulk_id',
        'created_by_relation',
        'name',
        'gender',
        'mobile',
        'email',
        'otp',
        'dob',
        'age',
        'verify_by',
        'subscribe_flag',
        'marriage_status',
        'rating',
        'religion',
        'subcaste',
        'language',
        'otherlanguage',
        'mothertongue',
        'maritalstatus',
        'children',
        'height',
        'familystatus',
        'familytype',
        'familyvalue',
        'family_god',
        'village_temple',
        'disability',
        'caste',
        'dosham',
        'doshamdetail',
        'hours',
        'mins',
        'am_pm',
        'horoscope_image',
        'birth_place',
        'education',
        'occupation',
        'annualincome',
        'worklocation',
        'state',
        'city',
        'taluk',
        'village',
        'pincode',
        'door_no',
        'land_mark',
        'permanent_address',
        'permanent_village',
        'permanent_pincode',
        'permanent_door_no',
        'permanent_land_mark',
        'about_you',
        'is_active',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    public function profileCreator()
    {
        return $this->belongsTo(User::class, 'profile_created_by');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function likedStatuses()
    {
        return $this->hasMany(LikedStatus::class, 'member_id');
    }

    public function hobbies()
    {
        return $this->hasMany(MemberHobby::class, 'member_id');
    }

    public function educationDetails()
    {
        return $this->hasOne(EducationDetail::class, 'member_id');
    }

    public function partnerInformation()
    {
        return $this->hasMany(PartnerInformation::class, 'member_id');
    }

//     public function partner_Information()
// {
//     return $this->hasOne(PartnerInformation::class); // or belongsTo
// }

public function partner_Information()
{
    return $this->hasOne(PartnerInformation::class, 'member_id', 'id');
}

    public function familyDetails()
    {
        return $this->hasOne(FamilyDetail::class, 'member_id');
    }

    public function activityLogs()
    {
        return $this->hasMany(MemberActivityLog::class, 'member_id');
    }

    public function likedProfiles()
    {
        return $this->hasMany(LikedProfile::class, 'member_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'member_id');
    }

    public function additionalDetails()
    {
        return $this->hasOne(MemberAddionalDetail::class, 'member_id');
    }

    public function education_details()
    {
        return $this->hasMany(EducationDetail::class, 'member_id', 'id');
    }
    public function additional()
    {
        return $this->hasOne(MemberAddionalDetail::class, 'member_id');
    }
    public function city()
{
    return $this->belongsTo(City::class, 'city', 'id');
}
public function mobileRequestPending()
{
    return $this->hasOne(MemberActivityLog::class, 'member_id');
}


public function star()
{
    return $this->belongsTo(Star::class, 'star_id');
}

public function raasi()
{
    return $this->belongsTo(Raasi::class, 'raasi_id');
}


public function horoscopeDetail()
{
    return $this->hasOne(HoroscopeDetail::class, 'member_id');
}

}
