<?php

namespace App\Http\Resources;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Subscription */
class SubscriptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'is_enable' => $this->is_enable,
            'Subscription_code' => $this->Subscription_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'student_id' => $this->student_id,
            'subscription_type_id' => $this->subscription_type_id,

            'student' => new StudentResource($this->whenLoaded('student')),
            'subscriptionType' => new SubscriptionTypeResource($this->whenLoaded('subscriptionType')),
        ];
    }
}
