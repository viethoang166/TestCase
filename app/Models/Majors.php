<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', 
        'note',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class, 'majors_schools');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_id','id');
    }
}
