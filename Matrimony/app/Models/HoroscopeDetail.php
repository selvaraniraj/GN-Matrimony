<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoroscopeDetail extends Model
{
    use HasFactory;

    protected $table = 'horoscope_detail';

    protected $fillable = [
        'member_id',
        'rasi_1',
        'rasi_2',
        'rasi_3',
        'rasi_4',
        'rasi_5',
        'rasi_6',
        'rasi_7',
        'rasi_8',
        'rasi_9',
        'rasi_10',
        'rasi_11',
        'rasi_12',
        'Navamsam_1',
        'Navamsam_2',
        'Navamsam_3',
        'Navamsam_4',
        'Navamsam_5',
        'Navamsam_6',
        'Navamsam_7',
        'Navamsam_8',
        'Navamsam_9',
        'Navamsam_10',
        'Navamsam_11',
        'Navamsam_12',
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
