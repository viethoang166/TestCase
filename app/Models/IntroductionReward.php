<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionReward extends Model
{
    use HasFactory;
    
    public const ICON_PATH = "introduction" . DIRECTORY_SEPARATOR . "reward" . DIRECTORY_SEPARATOR;
    protected $fillable = [
        'icon',
        'title',
        'description',
    ];
}
