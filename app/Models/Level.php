<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'note'
    ];

    public function contactInfos()
    {
        return $this->hasMany(ContactInfo::class);
    }
}
