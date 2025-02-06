<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'university_id' => ['nullable', 'integer', 'exists:universities,id'],
            'college_id' => ['nullable', 'integer', 'exists:colleges,id'],
            'department_id' => ['nullable', 'integer', 'exists:departments,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
