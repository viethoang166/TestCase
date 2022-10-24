<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
        'image',
        'description',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id','id');
    }

    public function contactInfos()
    {
        return $this->hasMany(ContactInfo::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class, 'country_id');
    }

    public function studyabroad()
    {
        return $this->belongsTo(Studyabroad::class, 'country_id');
    }

}
