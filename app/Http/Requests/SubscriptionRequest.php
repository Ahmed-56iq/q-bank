<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'subscription_type_id' => ['required', 'exists:subscription_types,id'],
            'is_enable' => ['boolean'],
            'subscription_code' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
