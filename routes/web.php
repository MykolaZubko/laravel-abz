<?php

//use App\Models\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/users');
});

//Route::get('/token', [UserController::class, 'getToken']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/more', [UserController::class, 'getMore'])->name('more');
    Route::get('/create/user', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/positions', [UserController::class, 'positions']);
    Route::get('/token', [UserController::class, 'getToken']);
});



Auth::routes();
Route::get('/users', [UserController::class, 'index'])->name('users');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
