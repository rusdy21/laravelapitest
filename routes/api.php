<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API route for login user
Route::post('/login', [App\Http\Controllers\api\AuthController::class, 'login']);

//API register
Route::post('/register', [App\Http\Controllers\api\AuthController::class, 'register']);

//protecting routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//forgotpassword
Route::post('password/email',  App\Http\Controllers\api\ForgotPasswordController::class);
Route::post('password/code/check', App\Http\Controllers\api\CodeCheckController::class);
Route::post('password/reset', [App\Http\Controllers\api\ResetPasswordController::class,'resPassword']);

Route::get('/logout', [App\Http\Controllers\api\AuthController::class, 'logout'])->middleware('auth:sanctum');;



/*Route::middleware('auth:sanctum')->group( function () {
    Route::get('/logout', [App\Http\Controllers\api\AuthController::class, 'logout']);
});*/

