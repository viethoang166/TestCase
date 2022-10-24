<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    public const STATUS = [
        'Pending' => 0,
        'Processing' => 1,
        'Completed' => 2
    ];
    protected $table = 'contact_info';
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'status',
        'country_id',
        'level_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class , 'level_id');
    }


}
