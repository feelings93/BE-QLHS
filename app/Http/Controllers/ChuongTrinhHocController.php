<?php

namespace App\Http\Controllers;

use App\ChuongTrinhHoc;
use App\Khoi;
use App\MonHoc;
use Illuminate\Http\Request;

class ChuongTrinhHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $khois = Khoi::all();
        $mhs = MonHoc::all();
        $cths = ChuongTrinhHoc::all();
        foreach($cths as $cth) {
            $cth->tenMH = $mhs->where('maMH', $cth->maMH)->first()->tenMH;
            $cth->tenKhoi = $khois->where('maKhoi', $cth->maKhoi)->first()->tenKhoi;
        }
        return $cths;
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
        //
        if (!is_numeric($request->heSo) || $request->heSo <= 0) return response()->json(['message' => "Hệ số điểm không hợp lệ"], 422);
        $cth = ChuongTrinhHoc::where('maMH', $request->maMH)->where('maKhoi', $request->maKhoi)->get();
        if ($cth->count() > 0) {
            return response()->json(['message' => "Chương trình học này đã tồn tại"], 422);
        }
        $new = ChuongTrinhHoc::create($request->all());
        $new->tenMH = $new->MonHoc->tenMH;
        $new->tenKhoi = $new->Khoi->tenKhoi;
        return $new;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cth = ChuongTrinhHoc::find($id);
        if ($cth == null) {
            return response()->json(['message' => 'Không tìm thấy chương trình học'], 404);
        }

        $new = new ChuongTrinhHoc();
        $new->maCTH = $cth->maCTH;
        $new->tenMH = $cth->MonHoc->tenMH;
        $new->tenKhoi = $cth->Khoi->tenKhoi;
        $new->heSo = $cth->heSo;
        return $new;
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
    public function update(Request $request, $id)
    {
        if (!is_numeric($request->heSo) || $request->heSo <= 0) return response()->json(['message' => "Hệ số điểm không hợp lệ"], 422);
        $cth = ChuongTrinhHoc::find($id);
        if ($cth == null) {
            return response()->json(['message' => 'Không tìm thấy chương trình học'], 404);
        }
        $cth->heSo = $request->heSo;
        $cth->save();
        return response()->json(['message '=> 'Cập nhật thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        foreach (json_decode($request->maCTH, true)  as $maCTH)
        {
            $delCTH = ChuongTrinhHoc::find($maCTH);
            $delCTH->delete();

        }


        return response()->json(['message' => 'Xóa chương trình học thành công'], 200);
    }
}
