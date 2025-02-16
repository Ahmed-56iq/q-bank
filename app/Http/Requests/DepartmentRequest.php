<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'college_id' => ['required', 'exists:colleges,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
