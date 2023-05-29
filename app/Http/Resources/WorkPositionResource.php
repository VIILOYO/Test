<?php

namespace App\Http\Resources;

use App\Models\WorkPosition;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin WorkPosition
 */
class WorkPositionResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
