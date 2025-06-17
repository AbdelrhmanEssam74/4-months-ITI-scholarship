<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/create', [ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/delete/{id}' ,[ArticleController::class , 'delete']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
