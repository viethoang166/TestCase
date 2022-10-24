<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const AVATAR_PATH = "admin" . DIRECTORY_SEPARATOR . "avatar" . DIRECTORY_SEPARATOR;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'avata',
        'age',
        'sex',
        'active',
        'type',
    ];

    const TYPES = [
        'admin' => 1,
        'staff' => 2,
        'advisor' => 3,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->type == self::TYPES['admin'];
    }

    public function isStaff()
    {
        return $this->type == self::TYPES['staff'];
    }

    public function isActive()
    {
        return $this->active == 1;
    }

    public function getTypeName()
    {
        if (!isset($this->type)) {
            return "Chưa phân loại";
        }

        return array_search($this->type, self::TYPES);
    }
}
