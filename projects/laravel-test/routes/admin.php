<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/
Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, "index"]);
Route::get("article/edit", [\App\Http\Controllers\Admin\ArticleController::class, "edit"])
     ->name("article.edit");
Route::get("article/{id}/delete", [\App\Http\Controllers\Admin\ArticleController::class, "destroy"])
     ->name("article.destroy");
Route::get("article/create", [\App\Http\Controllers\Admin\ArticleController::class, "create"])
     ->name("article.create");
