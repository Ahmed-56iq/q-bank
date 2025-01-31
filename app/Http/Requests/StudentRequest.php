<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'full_name' => ['nullable'],
            'university' => ['nullable'],
            'college' => ['nullable'],
            'department' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
