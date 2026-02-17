<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $table = 'hobbies';

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

    public function memberHobbies()
    {
        return $this->hasMany(MemberHobby::class, 'hobby_id');
    }
}
