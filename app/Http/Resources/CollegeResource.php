<?php

namespace App\Http\Resources;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin College */
class CollegeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'university_id' => $this->university_id,
            'university' => new UniversityResource($this->university),
        ];
    }
}
