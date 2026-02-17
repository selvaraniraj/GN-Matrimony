<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'routes';
    protected $fillable = ['name', 'path', 'is_active'];
}
