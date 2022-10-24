<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studyabroad extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'school_id',
        'country_id',
    ];

    public function countries()
    {
        return $this->hasMany(Country::class, 'country_id','id');
    }
    public function schools()
    {
        return $this->hasMany(School::class, 'school_id','id');
    }
}
