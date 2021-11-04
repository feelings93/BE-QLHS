<?php

use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\KhoiController;
use App\Http\Controllers\LopController;
use Illuminate\Http\Request;

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

Route::group([

    'middleware' => ['api', 'cors'],
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('hoc-sinh', [HocSinhController::class, 'index']);
});
Route::group([
    'middleware' => ['cors'],
], function ($router) {


Route::get('/hoc-sinh/{maHS}', [HocSinhController::class, 'show']);
Route::post('/hoc-sinh', [HocSinhController::class, 'store']);
Route::put('/hoc-sinh/{maHS}', [HocSinhController::class, 'update']);
Route::delete('/hoc-sinh/{maHS}', [HocSinhController::class, 'destroy']);

Route::get('/khoi', [KhoiController:: class, 'index']);
Route::get('/khoi/{id}', [KhoiController::class, 'show']);

Route::get("/lop", [LopController::class, 'index']);
Route::post("/lop", [LopController::class, 'store']);
});



