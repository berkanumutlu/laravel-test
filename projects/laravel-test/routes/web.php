<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/', function ()
{
    return view('welcome');
});*/
//Route::get('/home', [\App\Http\Controllers\HomeController::class, "index"]);
/*
 * Laravel 8'e kadar bu tanım düzgün çalışıyor.
 */
//Route::get('/', "HomeController@index");
//Route::get('/', function () { return view('web.home.index'); })->name('home');
Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])
     ->name('home');
Route::get('/about', [\App\Http\Controllers\AboutController::class, "index"])
     ->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, "index"])
     ->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, "contact_form"]);
Route::post('/user/{id}/{name}', [\App\Http\Controllers\ContactController::class, "user_form"])
     ->name('contact.user_form')
    //->where("id", "[0-9]+");
     ->where(["id" => "[0-9]+", "name" => "[a-z]+"]);
Route::match(['get', 'post'], '/match_form', [\App\Http\Controllers\ContactController::class, "match_form"])
     ->name('contact.match_form');

