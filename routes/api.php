<?php

use App\BangDiem;
use App\GiaoVien;
use App\HocSinh;
use App\Http\Controllers\BangDiemController;
use App\Http\Controllers\ChuongTrinhHocController;
use App\Http\Controllers\HocKyController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\KhoiController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\QuanLyLopController;
use App\Http\Controllers\QuaTrinhHocController;
use App\Http\Controllers\ThamSoController;
use App\Http\Controllers\TongKetHocKyController;
use App\Http\Controllers\TongKetMonController;
use App\Lop;
use App\MonHoc;
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
Route::get('/chi-tiet-hs/{maHS}', [HocSinhController::class, 'getChiTietHocSinh']);

Route::get('/hoc-sinh-trong/{id}', [HocSinhController::class, 'getHocSinhTrong']);

Route::post('/hoc-sinh', [HocSinhController::class, 'store']);
Route::put('/hoc-sinh/{maHS}', [HocSinhController::class, 'update']);
Route::post('/hoc-sinh/delete', [HocSinhController::class, 'destroy']);
// Học Kỳ
Route::get('/hk', [HocKyController:: class, 'index']);

// Khối
Route::get('/khoi', [KhoiController:: class, 'index']);
Route::get('/khoi/{id}', [KhoiController::class, 'show']);
// Lớp
Route::get("/lop&maHK={maHK}", [LopController::class, 'index']);
Route::get("/lop/{maLop}/{maHK}", [LopController::class, 'getHocSinhCuaLop']);
Route::post("/lop/{maLop}/{maHK}", [LopController::class, 'addHocSinhVaoLop']);
Route::post("/lop/xoa-hoc-sinh/{maLop}/{maHK}", [LopController::class, 'xoaHocSinhKhoiLop']);
Route::post("/lop", [LopController::class, 'store']);
// Qá trình học
Route::put("/qth/{id}", [QuaTrinhHocController::class, 'update']);
// Cán bộ
Route::put("/qll", [QuanLyLopController::class, 'updateCanBo']);
Route::get("/gv-trong/{maHK}", [QuanLyLopController::class, 'getGVTrong']);

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
Route::post("/cth/delete", [ChuongTrinhHocController::class, 'destroy']);

// Môn học
Route::get("/mon-hoc", [MonHocController::class, 'index']);
Route::post("/mon-hoc", [MonHocController::class, 'store']);
Route::get("/mon-hoc/{id}", [MonHocController::class, 'show']);
Route::put("/mon-hoc/{id}", [MonHocController::class, 'update']);
Route::post("/mon-hoc/delete", [MonHocController::class, 'destroy']);

// Điểm
Route::get("bang-diem/{maHK}/{maLop}/{maMH}", [BangDiemController::class, 'getBangDiem']);
Route::post("bang-diem", [BangDiemController::class, 'themBangDiem']);
Route::put("bang-diem/{maBD}", [BangDiemController::class, 'suaBangDiem']);
// Môn học, học kì, lớp
Route::get("lop-hk-mh", [BangDiemController::class, 'getLopHKMH']);
// Thông tin cá nhân
Route::put("profile/{id}", 'AuthController@updateProfile');
// Thay đổi mật khẩu
Route::put("change-password/{id}", 'AuthController@updatePassword');
// Tổng kết môn
Route::get("tkm/{maHK}/{maMH}", [TongKetMonController::class, 'getByForeign']);
Route::put("tkm/{maHK}/{maMH}", [TongKetMonController::class, 'updateByForeign']);
// Tổng kết học kỳ
 Route::get("tkhk/{maHK}", [TongKetHocKyController::class, 'getByForeign']);
 Route::put("tkhk/{maHK}", [TongKetHocKyController::class, 'updateByForeign']);
// Tổng quan
Route::get("tong-quan", function () {
    $soLopHoc = Lop::all()->count();
    $soGV = GiaoVien::all()->count();
    $soHocSinh = HocSinh::all()->count();
    $soMonHoc = MonHoc::all()->count();
    return response()->json(["soLopHoc" => $soLopHoc, "soGV" => $soGV, "soHocSinh" => $soHocSinh, "soMonHoc" => $soMonHoc]);
});
// Top học sinh điểm cao trong học kì
Route::get("top-hs/{maHK}", [HocSinhController::class, 'getTopHocSinh']);
// Top lớp theo học kì
Route::get("top-lop/{maHK}", [LopController::class, 'getTopLop']);
// Số lượng đạt, rớt theo năm
Route::get("dat-rot", [TongKetHocKyController::class, 'getDatRot']);

});



