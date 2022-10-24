<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;

    public const IMAGE_PATH = 'admin' . DIRECTORY_SEPARATOR . 'core-value' . DIRECTORY_SEPARATOR;
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
    ];
}
