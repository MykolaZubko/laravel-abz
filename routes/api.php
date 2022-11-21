<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::group(['middleware' => 'auth:sanctum'], function (){
//   Route::get('/token', [UserController::class, 'getToken']);
//    Route::get('/users', [UserController::class, 'index'])->name('users');
//    Route::get('/more', [UserController::class, 'getMore'])->name('more');
//    Route::get('/create/user', [UserController::class, 'create']);
//    Route::post('/store', [UserController::class, 'store']);
//    Route::get('/user/{id}', [UserController::class, 'show']);
//    Route::get('/positions', [UserController::class, 'positions']);
//});
//Route::post('/tokens/create', function (Request $request) {
//    $token = $request->user()->createToken($request->token_name);
//
//    return ['token' => $token->plainTextToken];
//});
