<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassifyRequest;
use App\Http\Resources\ClassifyResource;
use App\Models\Classify;

class ClassifyController extends Controller
{
    public function index()
    {
        return ClassifyResource::collection(classify::withCount('question')->get());
        }

    public function getByCategory($category)
    {
        return ClassifyResource::collection(classify::where('category_id', $category)->withCount('question')->get());
        }

    public function store(ClassifyRequest $request)
    {
        return new ClassifyResource(classify::create($request->validated()));
        }

    public function show(Classify $classify)
        {
        return new ClassifyResource($classify->loadCount('question'));
        }

public function update(ClassifyRequest $request, Classify $classify)
        {
            $classify->update($request->validated());

            return new ClassifyResource($classify);
        }

    public function destroy(Classify $classify)
    {
        $classify->delete();

            return response()->json();
        }
    }
