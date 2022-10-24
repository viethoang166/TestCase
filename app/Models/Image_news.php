<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_news extends Model
{
    use HasFactory;

    protected $table = 'image_news';

    protected $fillable = [
        'id',
        'name',
        'file',
        'banner',
        'new_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'new_id');
    }
}
