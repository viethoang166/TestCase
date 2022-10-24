<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Course extends Model
{
    use HasFactory;

    protected $dates = ['timestart', 'timeend'];

    protected $fillable = [
        'id',
        'name', 
        'note',
        'majors_id',
        'tuition',
        'timestart',
        'timeend',
    ];

    public function majors()
    {
        return $this->belongsTo(Majors::class,'majors_id','id');
    }

    public function getTimestartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getTimeendAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function school()
    {
        return $this->belongsToMany(School::class,'school_id');
    }
}
