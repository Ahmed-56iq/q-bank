<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollegeRequest;
use App\Http\Resources\CollegeResource;
use App\Models\College;

class CollegeController extends Controller
{
    public function index()
    {
        return CollegeResource::collection(College::all());
    }

    public function store(CollegeRequest $request)
    {
        return new CollegeResource(College::create($request->validated()));
    }

    public function show(College $college)
    {
        return new CollegeResource($college);
    }

    public function update(CollegeRequest $request, College $college)
    {
        $college->update($request->validated());

        return new CollegeResource($college);
    }

    public function destroy(College $college)
    {
        $college->delete();

        return response()->json();
    }
}
