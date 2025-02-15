<?php

namespace App\Http\Resources;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Student */
class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'university_id' => $this->university_id,
            'college_id' => $this->college_id,
            'department_id' => $this->department_id,
            'user'=> new UserResource($this->user) ,
            'university' => new UniversityResource($this->university)   ,
            'college' => new CollegeResource($this->college),
            'department' => new DepartmentResource($this->department),
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
