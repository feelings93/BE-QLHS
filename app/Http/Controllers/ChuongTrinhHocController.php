<?php

namespace App\Http\Controllers;

use App\ChuongTrinhHoc;
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
        return ChuongTrinhHoc::all()->map(
            function($item, $index)
            {
                $new = new ChuongTrinhHoc();
                $new->maCTH = $item->maCTH;
                $new->tenMH = $item->MonHoc->tenMH;
                $new->tenKhoi = $item->Khoi->tenKhoi;
                $new->heSo = $item->heSo;
                 return $new;
            }
        );
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
