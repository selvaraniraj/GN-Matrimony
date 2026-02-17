<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'associations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'association_name',
        'association_phoneno',
        'secretary_number',
         'association_regno',
        'treasurer_number',
        'secretary',
        'association_head',
        'address',
        'state',
        'city',
        'taluk',
        'village',
        'image',
        'treasurer_name',
        'username',
        'password',
        'president_number',
        'email',
        'is_active'
    ];

    /**
     * Get the user that owns the association.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
