<?php

namespace App\Http\Controllers;

use App\QuaTrinhHoc;
use Illuminate\Http\Request;

class QuaTrinhHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $qth = QuaTrinhHoc:: find($id);
        if ($qth === null) return \response()->json(['message'=> "Không tìm thấy"], 404);
        $qth->baoHiem = $request->tinhTrangBaoHiem === "Đã đóng" ? 1 : 0;
        $qth->hocPhi = $request->tinhTrangHocPhi === "Đã đóng" ? 1 : 0;
        $qth->hanhKiem = $request->hanhKiem;
        $qth->save();
        return $qth;

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
