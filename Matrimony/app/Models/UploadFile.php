<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use HasFactory;

    protected $table = 'upload_files';

    protected $fillable = [
        'file_name',
        'file_type',
        'file_size',
        'file_path',
        'is_active',
    ];

    public function setFileNameAttribute($value)
    {
        $this->attributes['file_name'] = ucfirst($value);
    }

    public function setFileSizeAttribute($value)
    {
        $this->attributes['file_size'] = $value;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
