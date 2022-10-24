<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSchool extends Model
{
    use HasFactory;
    protected $table = 'image_schools';

    protected $fillable = [
        'id',
        'name',
        'file',
        'school_id',
        'banner',
    ];

    public function news()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    
}
