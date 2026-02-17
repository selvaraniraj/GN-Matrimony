<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_log extends Model
{
    use HasFactory;

    protected $table = 'search_log';

    // Mass assignable attributes
    protected $fillable = [
        'member_id',
        'age',
        'age1',
        'height',
        'height2',
        're_religion',
        'mother_tongue',
        'subcaste',
        'star',
        'education',
        'income',
        'showprofilewith',
        'dontshow',
        'key_age',
        'key_age1',
        'key_height',
        'key_height1',
        'key_word',
        'key_showprofilewith',
        'key_dontshow',
        'matrimony_id',
        'is_active',

          ];


}
