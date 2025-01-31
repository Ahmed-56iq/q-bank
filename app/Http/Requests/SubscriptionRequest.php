<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'exists:students'],
            'subscription_type_id' => ['required', 'exists:subscription_types'],
            'is_enable' => ['boolean'],
            'Subscription_code' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
