<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'id',
        'title',
        'status',
        'type',
        'content',
        'user_id',
    ];

    public function images()
    {
        return $this->hasMany(Image_news::class, 'new_id', 'id');
    }

    public function get_banner()
    {

    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public $sortable = ['name','id',];


}
