<?php

namespace App\Http\Controllers;

use App\HocKy;
use App\HocSinh;
use Illuminate\Http\Request;
use App\Lop;
use App\QuaTrinhHoc;
use Illuminate\Database\Eloquent\Collection;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lop::all();
    }
    public function getHocSinhCuaLop($maLop, $maHK)
    {
        $lop = Lop::find($maLop);
        $qths = $lop->QTH()->where('maHK',$maHK)->get();
        $hss = new Collection();
        foreach ($qths as $qth) {
            $hs = $qth->HocSinh;
            $hs->tenLop = $lop->tenLop;
            $hs->diemTB = $qth->diemTB;
            $hss->add($hs);
        }
        $lop->hocSinh = $hss;
        return $lop;
    }

    public function addHocSinhVaoLop(Request $request, $maLop, $maHK)
    {
        foreach (json_decode($request->maHS, true)  as $maHS)
        {
            $qth = new QuaTrinhHoc();
            $qth->maLop = $maLop;
            $qth->maHK = $maHK;
            $qth->maHS = $maHS;
            $qth->diemTB = -1;
            $qth->save();
        }
        return response()->json(['message' => 'Thêm vào lớp thành công'], 200);
    }
    public function xoaHocSinhKhoiLop(Request $request, $maLop, $maHK)
    {
        $qths = QuaTrinhHoc::where('maLop', $maLop)->where('maHK', $maHK)->get();
        foreach (json_decode($request->maHS, true)  as $maHS)
        {
            $delQths = $qths->where('maHS', $maHS)->first();
            $delQths->delete();

        }
        return response()->json(['message' => 'Xóa khỏi lớp thành công'], 200);
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
        $lop = Lop::create($request->all());
        return $lop;
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
        //
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
