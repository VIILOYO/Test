<?php

namespace App\Http\Resources;

use App\Models\WorkPosition;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin WorkPosition
 */
class WorkPositionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
