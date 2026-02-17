<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'roles';
    protected $fillable = ['name', 'is_active'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_id');
                    // ->withTimestamps();
    }
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'permissions')
                    ->where('is_active', '=', true)
                    ->withTimestamps();
    }
}
