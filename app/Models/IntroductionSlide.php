<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionSlide extends Model
{
    use HasFactory;

    public const BANNER_PATH = "introduction" . DIRECTORY_SEPARATOR . "banner" . DIRECTORY_SEPARATOR;
    protected $fillable = [
        'file'
    ];
}
