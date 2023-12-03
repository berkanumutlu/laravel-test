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
 * name ===> Front tarafında belirtilen isimdeki route'a ulaşmak için kullanılır.
 */
Route::get('/', [\App\Http\Controllers\Web\HomeController::class, "index"])
    ->name('home');
Route::get('/about', [\App\Http\Controllers\Web\AboutController::class, "index"])
    ->name('about');
Route::get('/contact', [\App\Http\Controllers\Web\ContactController::class, "index"])
    ->name('contact');
Route::post('/contact', [\App\Http\Controllers\Web\ContactController::class, "contact_form"]);
/*
 * where ===> URL'deki parametrelere belirli koşullar atamak için kullanılır.
 */
Route::post('/contact/user/{id}/{name}', [\App\Http\Controllers\Web\ContactController::class, "user_form"])
    ->name('contact.user_form')
    //->where("id", "[0-9]+");
    ->where(["id" => "[0-9]+", "name" => "[a-z]+"]);
/*
 * Match ===> Bir adrese birden fazla metotlarla(get, post) ulaşmak için kullanılır.
 */
Route::match(['get', 'post'], '/match_form', [\App\Http\Controllers\Web\ContactController::class, "match_form"])
    ->name('contact.match_form');
/*
 * Patch ===> Kullanıcıya ait sadece tek bir veriyi güncellemek için kullanılır. Örneğin sadece kullanıcı adı
 *
 * Put ===> Kullanıcıya ait tüm bilgileri güncellemek için kullanılır.
 *
 * Delete ===> Kullanıcıyı, veriyi silmek için kullanılır.
 */
Route::get('user', [\App\Http\Controllers\Web\UserController::class, "index"])
    ->name('user');
Route::patch('user/{id}/update', [\App\Http\Controllers\Web\UserController::class, "update"])
    ->name('user.update');
Route::put('user/{id}/update-all', [\App\Http\Controllers\Web\UserController::class, "update_all"])
    ->name('user.update_all');
Route::delete('user/{id}/delete', [\App\Http\Controllers\Web\UserController::class, "delete"])
    ->name('user.delete');
/*
 * Any ===> Tüm istek türlerini kabul eder.
 */
Route::any('any', function () {
    dump('Route any method');
});
/*
 * Resource ===> Controller'a ait index, create, store, show, edit, update, destroy route tanımlamalarını ve metotlarını oluşturmayı sağlar.
 * php artisan make:controller ArticleController --resource
 *
 * ApiResource ===> API Controller'a ait index, store, show, update, destroy route tanımlamalarını ve metotlarını oluşturmayı sağlar.
 * php artisan make:controller ArticleController --api
 */
Route::resource("articles", "ArticleController");
//Route::apiResource("/api/article", "Api/ArticleController");
/*
 * where, whereNumber, whereAlpha, whereAlphaNumeric, whereUuid, whereUlid, whereIn
 */
Route::get("/user/{id}", [\App\Http\Controllers\Web\UserController::class, "show"])
    ->name('user.show')
    ->whereNumber("id");
Route::get("/user/{name}", [\App\Http\Controllers\Web\UserController::class, "show_name"])
    ->name('user.show_name')
    //->whereAlpha("name");
    ->whereAlphaNumeric("name"); // Hem numeric hem karakter gelebilir anlamına geliyor.
Route::get("/user/check/{role}", [\App\Http\Controllers\Web\UserController::class, "check_role"])
    ->name('user.check_role')
    ->whereIn("role", ["admin", "user"]);
/*
 * Prefix ===> Route değerinin başına ön ek eklemeyi sağlıyor.
 *
 * Group ===> Belirli bir route tanımlamalarını gruplamayı sağlıyor. Bu gruba name ve prefix ekleyerek grup içerisindeki route tanımlarının hepsine uygulamasını sağlayabiliriz.
 * Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){ });
 */
/*Route::prefix("admin")
     ->name("admin.")
     ->group(function ()
     {
         Route::get("/article/edit", [\App\Http\Controllers\Admin\ArticleController::class, "edit"])
              ->name("article.edit");
         Route::get("/article/{id}/delete", [\App\Http\Controllers\Admin\ArticleController::class, "destroy"])
              ->name("article.destroy");
     });*/
/*Route::controller(\App\Http\Controllers\UserController::class)
     ->group(function ()
     {
         Route::get('/get-user', "get_user");
         Route::get('/delete-user', "delete_user");
     });*/
/*Route::get('/article', [\App\Http\Controllers\Web\ArticleController::class, "index"])
     ->name('article');*/
Route::get('login', [\App\Http\Controllers\Web\LoginController::class, "index"])->name('login');
Route::post('login', [\App\Http\Controllers\Web\LoginController::class, "login"]);
