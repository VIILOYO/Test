<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class WorkerResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'department' => $this->department_id,
            'position' => $this->position_id,
            'adopted_at' => $this->created_at,
        ];
    }
}
