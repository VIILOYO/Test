<?php

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Department
 */
class DepartmentWithWorkersResource extends JsonResource
{
    /**
     * @param $request
     * @return array<string, AnonymousResourceCollection|string>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'workers' => UserCardResource::collection($this->users()->paginate()),
        ];
    }
}
