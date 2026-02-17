<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionAmount extends Model
{
    use HasFactory;

    protected $table = 'subscription_amounts';

    protected $fillable = [
        'amount',
        'expiry_date',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
