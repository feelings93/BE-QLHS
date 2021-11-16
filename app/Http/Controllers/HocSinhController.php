<?php

namespace App\Http\Controllers;

use App\HocKy;
use App\HocSinh;
use App\ThamSo;
use DateTime;
use Illuminate\Http\Request;

class HocSinhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }//

    /**
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HocSinh::all();


    }

     public function getHocSinhTrong($maHK)
    {
        $hk = HocKy::find($maHK);
        $qths = $hk->QTH()->get();
        $maHSDaHoc = [];
        foreach ($qths as $qth) {
            $hs = $qth->HocSinh;
            array_push($maHSDaHoc, $hs->maHS);

        }
        return HocSinh::all()->except($maHSDaHoc);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (str_word_count(trim($request->hoTen)) === 0 || str_word_count(trim($request->gioiTinh)) === 0 || str_word_count(trim($request->diaChi)) === 0 ||str_word_count(trim($request->ngaySinh)) === 0)
        {
            return response()->json(['message' => "Vui lòng nhập đầy đủ thông tin"], 422);
        }
        $date = new DateTime($request->ngaySinh);
        $now = new DateTime();
        $interval = $now->diff($date);
        $interval->y;
        if ($interval->y < ThamSo::find(6)->giaTri || $interval->y > ThamSo::find(7)->giaTri)
         return \response()->json(['message' => "Tuổi không hợp lệ"], 422);
        $hocSinh = HocSinh::create($request->all());
        return $hocSinh;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $hs =  HocSinh::find($id);
        if ($hs != null) return $hs;
        return response()->json(["message" => "Không tìm thấy học sinh này"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $maHS)
    {
        if (str_word_count(trim($request->hoTen)) === 0 || str_word_count(trim($request->gioiTinh)) === 0 || str_word_count(trim($request->diaChi)) === 0 ||str_word_count(trim($request->ngaySinh)) === 0)
        {
            return response()->json(['message' => "Vui lòng nhập đầy đủ thông tin"], 422);
        }
        $date = new DateTime($request->ngaySinh);
        $now = new DateTime();
        $interval = $now->diff($date);
        $interval->y;
        if ($interval->y < ThamSo::find(6)->giaTri || $interval->y > ThamSo::find(7)->giaTri)
         return \response()->json(['message' => "Tuổi không hợp lệ"], 422);
        $hocSinh = HocSinh::find($maHS);
        if ($hocSinh) {

            $hocSinh->update($request->all());
          return $hocSinh;


        }
        else return response()->json(["message" => "Không tìm thấy học sinh này"], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       HocSinh::destroy($id);
        return response()->json(null, 204);
    }
}
