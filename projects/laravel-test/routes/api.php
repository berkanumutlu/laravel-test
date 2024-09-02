<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
 * Cross-Origin Resource Sharing (CORS)
 * config/cors.php
 */
Route::middleware(['cors'])->group(function () {
    Route::get('/api/data', 'DataController@index');
});
/*
 * Auth Custom Guard
 */
Route::middleware('auth:api')->group(function () {
    // ...
});

/*
 * Laravel Sanctum
 */
Route::post('/login', function (Request $request) {
    $user = \App\Models\User::where('email', $request->email)->first();
    if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    $token = $user->createToken('my-app-token')->plainTextToken;
    // $token = $user->createToken('token-name', ['*'], now()->addWeek())->plainTextToken;
    return response()->json(['token' => $token]);
});

// Token Abilities
/*return $user->createToken('token-name', ['server:update'])->plainTextToken;
if ($user->tokenCan('server:update')) {
    // ...
}
Route::get('/orders', function () {
    // Token has both "check-status" and "place-orders" abilities...
})->middleware(['auth:sanctum', 'abilities:check-status,place-orders']);*/

// Revoking Tokens
/*$user->tokens()->delete(); // Revoke all tokens...
$request->user()->currentAccessToken()->delete(); // Revoke the token that was used to authenticate the current request...
$user->tokens()->where('id', $tokenId)->delete(); // Revoke a specific token...
*/

// Authorizing Private Broadcast Channels (f your SPA needs to authenticate with private / presence broadcast channels)
// Broadcast::routes(['middleware' => ['auth:sanctum']]);

// Issuing API Tokens
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email'       => 'required|email',
        'password'    => 'required',
        'device_name' => 'required',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
});
