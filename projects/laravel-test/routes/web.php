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
 * Laravel 8'e kadar bu tanım düzgün çalışıyor. Sonraki versiyonlarda kullanmak için RouteServiceProvider'da değişiklik yapılması gerekiyor.
 */
//Route::get('/', "HomeController@index");
//Route::get('/', function () { return view('web.home.index'); })->name('home');
/*
 * name => Front tarafında belirtilen isimdeki route'a ulaşmak için kullanılır.
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])
     ->name('home');
Route::get('/about', [\App\Http\Controllers\AboutController::class, "index"])
     ->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, "index"])
     ->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, "contact_form"]);
/*
 * where => URL'deki parametrelere belirli koşullar atamak için kullanılır.
 */
Route::post('/contact/user/{id}/{name}', [\App\Http\Controllers\ContactController::class, "user_form"])
     ->name('contact.user_form')
    //->where("id", "[0-9]+");
     ->where(["id" => "[0-9]+", "name" => "[a-z]+"]);
/*
 * Match => Bir adrese birden fazla metotlarla(get, post) ulaşmak için kullanılır.
 */
Route::match(['get', 'post'], '/match_form', [\App\Http\Controllers\ContactController::class, "match_form"])
     ->name('contact.match_form');
/*
 * Patch => Kullanıcıya ait sadece tek bir veriyi güncellemek için kullanılır. Örneğin sadece kullanıcı adı
 *
 * Put => Kullanıcıya ait tüm bilgileri güncellemek için kullanılır.
 *
 * Delete => Kullanıcıyı, veriyi silmek için kullanılır.
 */
Route::get('user', [\App\Http\Controllers\UserController::class, "index"])
     ->name('user');
Route::patch('user/{id}/update', [\App\Http\Controllers\UserController::class, "update"])
     ->name('user.update');
Route::put('user/{id}/update-all', [\App\Http\Controllers\UserController::class, "update_all"])
     ->name('user.update_all');
Route::delete('user/{id}/delete', [\App\Http\Controllers\UserController::class, "delete"])
     ->name('user.delete');
