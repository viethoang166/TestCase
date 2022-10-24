<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'hotline',
        'email',
        'address',
        'facebook',
        'zalo',
        'map'
    ];
}
