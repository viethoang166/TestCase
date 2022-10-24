<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    protected $table = 'compare_school';
    use HasFactory;
    protected $fillable = [
        'avatar',
        'infor',
        'city',
        'highlight',
        'course',
        'infrastructure',
        'fee',
        'scholarship',
        'condition',
        'feedback',
        'note',
    ];
}
