<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::withCount('classifies')->get());
    }

    public function store(CategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->validated()));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->loadCount(relations: 'classifies'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }
}
