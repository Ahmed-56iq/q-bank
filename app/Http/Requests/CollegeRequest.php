<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'university_id' => ['required', 'exists:universities,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
