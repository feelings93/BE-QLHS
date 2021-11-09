<?php

use App\Http\Controllers\BangDiemController;
use App\Http\Controllers\ChuongTrinhHocController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\KhoiController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\ThamSoController;
use App\ThamSo;
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

// Học Sinh
Route::get('/hoc-sinh/{maHS}', [HocSinhController::class, 'show']);
Route::post('/hoc-sinh', [HocSinhController::class, 'store']);
Route::put('/hoc-sinh/{maHS}', [HocSinhController::class, 'update']);
Route::delete('/hoc-sinh/{maHS}', [HocSinhController::class, 'destroy']);
// Khối
Route::get('/khoi', [KhoiController:: class, 'index']);
Route::get('/khoi/{id}', [KhoiController::class, 'show']);
// Lớp
Route::get("/lop", [LopController::class, 'index']);
Route::post("/lop", [LopController::class, 'store']);
// Tham số
Route::get("/tham-so/{id}", [ThamSoController::class, 'show']);
Route::put("/tham-so/{id}", [ThamSoController::class, 'update']);
// Chương trình học
Route::get("/cth", [ChuongTrinhHocController::class, 'index']);
Route::post("/cth", [ChuongTrinhHocController::class, 'store']);
Route::get("/cth/{id}", [ChuongTrinhHocController::class, 'show']);
Route::put("/cth/{id}", [ChuongTrinhHocController::class, 'update']);
// Môn học
Route::get("/mon-hoc", [MonHocController::class, 'index']);
Route::post("/mon-hoc", [MonHocController::class, 'store']);
Route::get("/mon-hoc/{id}", [MonHocController::class, 'show']);
Route::put("/mon-hoc/{id}", [MonHocController::class, 'update']);
// Điểm
Route::get("bang-diem/{maHK}/{maLop}/{maMH}", [BangDiemController::class, 'getBangDiem']);
});



