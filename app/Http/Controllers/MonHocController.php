<?php

namespace App\Http\Controllers;

use App\MonHoc;
use App\ThamSo;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return MonHoc::all();
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
        if (str_word_count(trim($request->tenMH)) === 0 || !is_numeric($request->diemDat)) return response()->json(['message' => "Vui lòng nhập đủ thông tin"], 422);

        if (!is_numeric($request->diemDat) || $request->diemDat < 0 || $request->diemDat >10) return response()->json(['message' => "Điểm đạt không hợp lệ"], 422);
        if (!is_numeric($request->diemDat) || $request->diemDat < 0 || $request->diemDat >10) return response()->json(['message' => "Điểm đạt không hợp lệ"], 422);
        if (MonHoc::all()->count() >= ThamSo::find(4)->giaTri) return response()->json(['message' => "Số môn học đã đạt mức tối đa"], 422);
        return MonHoc::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mh = MonHoc::find($id);
        if ($mh == null) {
            return response()->json(['message' => 'Không tìm thấy môn học'], 404);
        }

        return $mh;
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
        $mh = MonHoc::find($id);
        if ($mh == null) {
            return response()->json(['message' => 'Không tìm thấy môn học'], 404);
        }
        if (str_word_count(trim($request->tenMH)) === 0 || !is_numeric($request->diemDat)) return response()->json(['message' => "Vui lòng nhập đủ thông tin"], 422);

        if (!is_numeric($request->diemDat) || $request->diemDat < 0 || $request->diemDat >10) return response()->json(['message' => "Điểm đạt không hợp lệ"], 422);
        $mh->tenMH = $request->tenMH;
        $mh->diemDat = $request->diemDat;
        $mh->save();
        return response()->json(['message' => 'Cập nhật thành công'], 200);
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
