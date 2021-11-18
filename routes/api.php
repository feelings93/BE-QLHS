<?php

use App\BangDiem;
use App\Http\Controllers\BangDiemController;
use App\Http\Controllers\ChuongTrinhHocController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\KhoiController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\QuaTrinhHocController;
use App\Http\Controllers\ThamSoController;
use App\QuaTrinhHoc;
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
    Route::post('register', 'AuthController@register');
    Route::post("users/delete", 'AuthController@delUsers');
    Route::get('users', 'AuthController@index');
    Route::put('user/{id}', 'AuthController@update');
    Route::post('reset/user/{id}', 'AuthController@reset');



});
Route::group([
    'middleware' => ['cors'],
], function ($router) {

// Học Sinh
Route::get('hoc-sinh', [HocSinhController::class, 'index']);

Route::get('/hoc-sinh/{maHS}', [HocSinhController::class, 'show']);
Route::get('/hoc-sinh-trong/{id}', [HocSinhController::class, 'getHocSinhTrong']);

Route::post('/hoc-sinh', [HocSinhController::class, 'store']);
Route::put('/hoc-sinh/{maHS}', [HocSinhController::class, 'update']);
Route::delete('/hoc-sinh/{maHS}', [HocSinhController::class, 'destroy']);
// Khối
Route::get('/khoi', [KhoiController:: class, 'index']);
Route::get('/khoi/{id}', [KhoiController::class, 'show']);
// Lớp
Route::get("/lop", [LopController::class, 'index']);
Route::get("/lop/{maLop}/{maHK}", [LopController::class, 'getHocSinhCuaLop']);
Route::post("/lop/{maLop}/{maHK}", [LopController::class, 'addHocSinhVaoLop']);
Route::post("/lop/xoa-hoc-sinh/{maLop}/{maHK}", [LopController::class, 'xoaHocSinhKhoiLop']);
Route::post("/lop", [LopController::class, 'store']);
// Qá trình học
Route::put("/qth/{id}", [QuaTrinhHocController::class, 'update']);

// Tham số
Route::get("/tham-so", [ThamSoController::class, 'index']);
Route::get("/tham-so/{id}", [ThamSoController::class, 'show']);
Route::put("/tham-so/{id}", [ThamSoController::class, 'update']);
Route::put("/tham-so", [ThamSoController::class, 'suaThamSo']);

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
Route::post("bang-diem", [BangDiemController::class, 'themBangDiem']);
Route::put("bang-diem/{maBD}", [BangDiemController::class, 'suaBangDiem']);
// Môn học, học kì, lớp
Route::get("lop-hk-mh", [BangDiemController::class, 'getLopHKMH']);
// Thông tin cá nhân
Route::put("profile/{id}", 'AuthController@updateProfile');

});



