<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::all());
    }

    public function getByClassify($classify)
    {
        return QuestionResource::collection(Question::where('classify_id', $classify)->get());
    }

    public function store(QuestionRequest $request)
    {
        return new QuestionResource(Question::create($request->validated()));
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return new QuestionResource($question);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json();
    }
}
