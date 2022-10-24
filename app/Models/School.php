<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class School extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'schools';

    protected $fillable = [
        'id',
        'name',
        'email',
        'infor',
        'address',
        'phone',
        'city_id',
        'country_id',
        'min_price',
        'max_price',
    ];

    public $sortable = ['name','country_id',];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(ImageSchool::class, 'school_id', 'id');
    }

    public function majors()
    {
        return $this->belongsToMany(Majors::class, 'majors_schools')->withTimestamps();
    }

    public function studyabroad()
    {
        return $this->belongsTo(Studyabroad::class,  'school_id');
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'school_id');
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'school_id');
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
