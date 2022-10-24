<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public const TYPES = [
        'text' => 0,
        'video' => 1,
    ];
    public const STATUSES = [
        'private' => 0,
        'public' => 1,
    ];
    protected $table = 'feed_backs';
    protected $fillable = [
        'type',
        'content',
        'status',
        'customer_id',
        'school_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
