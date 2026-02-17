<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'is_active',
    ];

    // Accessors and mutators if needed
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
