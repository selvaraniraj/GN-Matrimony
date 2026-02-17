<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $fillable = [
        'member_id',
        'photo_id',
        'is_active',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function uploadFile()
    {
        return $this->belongsTo(UploadFile::class, 'photo_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
