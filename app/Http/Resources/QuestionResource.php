<?php

namespace App\Http\Resources;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Question */
class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'answer_1' => $this->answer_1,
            'answer_2' => $this->answer_2,
            'answer_3' => $this->answer_3,
            'answer_4' => $this->answer_4,
            'correct_answer' => $this->correct_answer,
            'summary_answer' => $this->summary_answer,
            'code' => $this->code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'class_id' => $this->class_id,
        ];
    }
}
