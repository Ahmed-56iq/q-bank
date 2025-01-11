<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'is_enable' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
