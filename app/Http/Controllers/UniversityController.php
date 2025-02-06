<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversityRequest;
use App\Http\Resources\UniversityResource;
use App\Models\University;

class UniversityController extends Controller
{
    public function index()
    {
        return UniversityResource::collection(University::all());
    }

    public function store(UniversityRequest $request)
    {
        return new UniversityResource(University::create($request->validated()));
    }

    public function show(University $university)
    {
        return new UniversityResource($university);
    }

    public function update(UniversityRequest $request, University $university)
    {
        $university->update($request->validated());

        return new UniversityResource($university);
    }

    public function destroy(University $university)
    {
        $university->delete();

        return response()->json();
    }
}
