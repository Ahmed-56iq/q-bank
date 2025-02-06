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
            'subscription_code' => $this->subscription_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'subscription_type_id' => $this->subscription_type_id,

            'user' => new UserResource($this->user),
            'subscriptionType' => new SubscriptionTypeResource($this->subscriptionType),
        ];
    }
}
