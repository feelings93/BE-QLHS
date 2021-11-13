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
        ChuongTrinhHoc::create($request->all());
        return response()->json(['message' => 'Thêm chương trình học thành công'], 200);
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
    public function destroy($id)
    {
        //
    }
}
