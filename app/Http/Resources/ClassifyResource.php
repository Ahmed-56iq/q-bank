<?php

namespace App\Http\Resources;

use App\Models\Class;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Class */
class ClassifyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_enable' => $this->is_enable,
            'created_at' => $this->created_at,
            'questions_count' => $this->questions_count,

            'category' => $this->category->only('id', 'name', 'is_enable'),
            // 'category' => new CategoryResource($this->category),
        ];
    }
}
