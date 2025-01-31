<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'price' => ['required'],
            'expire_at' => ['required', 'date'],
            'note' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
