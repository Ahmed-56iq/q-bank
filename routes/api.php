<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [UserController::class, 'logout']);

    // Route::apiResource('categories', CategoryController::class);
    // Route::apiResource('classifies', ClassifyController::class);
    // Route::apiResource('questions', QuestionController::class);

    Route::get('/questions', [QuestionController::class, 'index']);
    Route::get('/classify/{classify}', [QuestionController::class, 'getByClassify']);
    Route::get('/questions/{question}', [QuestionController::class, 'show']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::put('/questions/{question}', [QuestionController::class, 'update']);
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy']);

    Route::get('/classifies', [ClassifyController::class, 'index']);
    Route::get('/category/{category}', [ClassifyController::class, 'getByCategory']);
    Route::get('/classifies/{classify}', [ClassifyController::class, 'show']);
    Route::post('/classifies', [ClassifyController::class, 'store']);
    Route::put('/classifies/{classify}', [ClassifyController::class, 'update']);
    Route::delete('/classifies/{classify}', [ClassifyController::class, 'destroy']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

});

