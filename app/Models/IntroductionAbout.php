<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionAbout extends Model
{
    use HasFactory;

    public const IMAGE_PATH = "introduction" . DIRECTORY_SEPARATOR . "about" . DIRECTORY_SEPARATOR;
    protected $table = 'introduction_about';
    protected $fillable = [
        'image', 
        'description',
    ];
}
