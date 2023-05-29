<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $email
 * @property string $image
 * @property string $about
 * @property string $type
 * @property string $github
 * @property string $city
 * @property bool $is_finished
 * @property string $phone
 * @property Carbon $birthday
 * @property ?PersonalAccessToken  $token
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, bool, string, Carbon>
     */
    protected $fillable = [
        'login',
        'name',
        'email',
        'image',
        'about',
        'type',
        'github',
        'city',
        'is_finished',
        'phone',
        'birthday',
        'password',
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
}
