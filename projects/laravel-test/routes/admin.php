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
Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, "index"])->name('home');
Route::prefix("login")->name("login.")->controller('LoginController')
    ->middleware('guest:admin')
    ->withoutMiddleware(['auth:admin'])
    ->group(function () {
        Route::get('', "index")->name('index');
        Route::post('', "login");
    });
Route::post('logout', [\App\Http\Controllers\Admin\LoginController::class, "logout"])->name('logout');
Route::prefix("article")->name("article.")->controller('ArticleController')
    ->group(function () {
        Route::get("add", "create")->name("add");
        Route::get('edit/{id}', "edit")->whereNumber('id')->name('edit');
        /*
         * Authorization with policy
         */
        Route::post('edit/{id}', "update")->whereNumber('id')->middleware('can:update,article');
        // Route::post('edit/{id}', "update")->whereNumber('id')->can('update', 'article');
        Route::get("delete/{id}", "destroy")->whereNumber('id')->name("delete");
    });
