<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property string $role
 * @property string $type
 * @property string $github
 * @property string $city
 * @property bool $is_finished
 * @property ?int $department_id
 * @property ?int $position_id
 * @property string $phone
 * @property Carbon $birthday
 * @property ?PersonalAccessToken  $token
 * @property string $created_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasFactory;

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
        'role',
        'type',
        'github',
        'city',
        'is_finished',
        'department_id',
        'position_id',
        'phone',
        'birthday',
        'password',
        'created_at',
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

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
