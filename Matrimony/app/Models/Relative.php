<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;

    protected $table = 'relative';

    protected $fillable = [
        'member_id',
        'first_relative_name',
        'first_relative_relation',
        'first_relative_bussiness',
        'first_relative_number',
        'second_relative_name',
        'second_relative_relation',
        'second_relative_bussiness',
        'second_relative_number',
        'third_relative_name',
        'third_relative_relation',
        'third_relative_bussiness',
        'third_relative_number',
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
