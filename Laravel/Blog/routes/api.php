<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Route::apiResource('articles',ArticleController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('articles', [ArticleController::class, 'store'])
        ->name('articles.store');
    Route::put('articles/{article:slug}', [ArticleController::class, 'update'])->name('articles.update');

    Route::post('comments', [CommentsController::class, 'store'])
        ->name('comments.store');
    Route::put('comments/{id}', [CommentsController::class, 'update'])
        ->name('comments.update');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('articles', [ArticleController::class, 'index']);

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');

