<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
class WorkPosition extends Model
{
    use HasFactory;

    protected $table = 'work_positions';

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'position_id');
    }
}
