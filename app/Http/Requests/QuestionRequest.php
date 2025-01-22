<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['required'],
            'answer_1' => ['required'],
            'answer_2' => ['required'],
            'answer_3' => ['required'],
            'answer_4' => ['required'],
            'correct_answer' => ['required'],
            'summary_answer' => ['required'],
            'code' => ['nullable'],
            'classify_id' => ['required', 'exists:classifies,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
