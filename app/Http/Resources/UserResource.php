<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'email' => $this->email,
            // 'is_admin' => $this->is_admin,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,

            // إضافة token فقط عند تسجيل الدخول
            'token' => $this->when($this->token, $this->token),
            'role' => $this->when($this->role, $this->role),
        ];
    }
}
