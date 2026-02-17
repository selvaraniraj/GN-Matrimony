<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerInformation extends Model
{
    use HasFactory;

    protected $table = 'partner_information';

    protected $fillable = [
        'member_id',
        'age',
        'age_from',
        'height_id',
        'height_id_from',
        'marital_status',
        'religion',
        'mother_tongue',
        'caste',
        'star',
        'rassi',
        'education',
        'dosam',
        'income',
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

    public function motherTongue()
    {
        return $this->belongsTo(Language::class, 'mother_tongue');
    }

    public function star()
    {
        return $this->belongsTo(Star::class);
    }

    public function raasi()
    {
        return $this->belongsTo(Raasi::class);
    }

    public function dosam()
    {
        return $this->belongsTo(DosamDetail::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function heightTo()
    {
        return $this->belongsTo(Height::class, 'height_id');
    }

    public function heightFrom()
    {
        return $this->belongsTo(Height::class, 'height_id_from');
    }
}
