<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
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
     * @var string[]
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
        'email_verified_at',
        'is_finished',
        'department_id',
        'position_id',
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

    /**
     * @return Collection
     */
    public function getDepartment(): Collection
    {
        return $this->belongsTo(Department::class, 'department_id')->get();
    }
}
