<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubscriptionTypeController;
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

    Route::group(['prefix' => 'question'], function () {
        Route::get('/', [QuestionController::class, 'index']);
        Route::get('/classify/{classify}', [QuestionController::class, 'getByClassify']);
        Route::get('/{question}', [QuestionController::class, 'show']);
        Route::post('/', [QuestionController::class, 'store']);
        Route::put('/{question}', [QuestionController::class, 'update']);
        Route::delete('/{question}', [QuestionController::class, 'destroy']);
    });

    Route::group(['prefix' => 'classify'], function () {
        Route::get('/', [ClassifyController::class, 'index']);
        Route::get('/category/{category}', [ClassifyController::class, 'getByCategory']);
        Route::get('/{classify}', [ClassifyController::class, 'show']);
        Route::post('/', [ClassifyController::class, 'store']);
        Route::put('/{classify}', [ClassifyController::class, 'update']);
        Route::delete('/{classify}', [ClassifyController::class, 'destroy']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{category}', [CategoryController::class, 'show']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{category}', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'destroy']);
    });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::group(['prefix' => 'subscription-type'], function () {
        Route::get('/', [SubscriptionTypeController::class, 'index']);
        Route::get('/{subscriptionType}', [SubscriptionTypeController::class, 'show']);
        Route::post('/', [SubscriptionTypeController::class, 'store']);
        Route::put('/{subscriptionType}', [SubscriptionTypeController::class, 'update']);
        Route::delete('/{subscriptionType}', [SubscriptionTypeController::class, 'destroy']);
    });
});

