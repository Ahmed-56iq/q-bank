<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassifyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'is_enable' => ['boolean'],
            'category_id' => ['required', 'exists:categories'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
