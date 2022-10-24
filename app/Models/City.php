<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'country_id',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function schools()
    {
        return $this->hasMany(School::class,'school_id');
    }

}
