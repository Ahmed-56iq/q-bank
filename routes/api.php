<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return 'test';
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [UserController::class, 'logout']);


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

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::post('/student', [UserController::class, 'storeStudent']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'student'], function () {
        Route::get('/', [StudentController::class, 'index']);
        Route::get('/{student}', [StudentController::class, 'show']);
        Route::post('/', [StudentController::class, 'store']);
        Route::put('/{student}', [StudentController::class, 'update']);
        Route::delete('/{student}', [StudentController::class, 'destroy']);
    });

    Route::group(['prefix' => 'subscription-type'], function () {
        Route::get('/', [SubscriptionTypeController::class, 'index']);
        Route::get('/{subscriptionType}', [SubscriptionTypeController::class, 'show']);
        Route::post('/', [SubscriptionTypeController::class, 'store']);
        Route::put('/{subscriptionType}', [SubscriptionTypeController::class, 'update']);
        Route::delete('/{subscriptionType}', [SubscriptionTypeController::class, 'destroy']);
    });

        Route::group(['prefix' => 'subscription'], function () {
            Route::get('/', [SubscriptionController::class, 'index']);
            Route::get('/{subscription}', [SubscriptionController::class, 'show']);
            Route::post('/', [SubscriptionController::class, 'store']);
            Route::put('/{subscription}', [SubscriptionController::class, 'update']);
            Route::delete('/{subscription}', [SubscriptionController::class, 'destroy']);
        });

        Route::group(['prefix' => 'university'], function () {
            Route::get('/', [UniversityController::class, 'index']);
            Route::get('/{university}', [UniversityController::class, 'show']);
            Route::post('/', [UniversityController::class, 'store']);
            Route::put('/{university}', [UniversityController::class, 'update']);
            Route::delete('/{university}', [UniversityController::class, 'destroy']);
        });

        Route::group(['prefix' => 'college'], function () {
            Route::get('/', [CollegeController::class, 'index']);
            Route::get('/{college}', [CollegeController::class, 'show']);
            Route::post('/', [CollegeController::class, 'store']);
            Route::put('/{college}', [CollegeController::class, 'update']);
            Route::delete('/{college}', [CollegeController::class, 'destroy']);
        });

        Route::group(['prefix' => 'department'], function () {
            Route::get('/', [DepartmentController::class, 'index']);
        Route::get('/{department}', [DepartmentController::class, 'show']);
        Route::post('/', [DepartmentController::class, 'store']);
        Route::put('/{department}', [DepartmentController::class, 'update']);
        Route::delete('/{department}', [DepartmentController::class, 'destroy']);
    });
});
