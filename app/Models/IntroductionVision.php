<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionVision extends Model
{
    use HasFactory;

    public const BACKGROUND_PATH = "introduction" . DIRECTORY_SEPARATOR . "vision" . DIRECTORY_SEPARATOR;
    protected $fillable = [
        'description',
        'background',
    ];
}
