<?php

namespace App\Http\Controllers;

use App\HocKy;
use App\HocSinh;
use Illuminate\Http\Request;
use App\Lop;
use App\QuanLyLop;
use App\QuaTrinhHoc;
use App\ThamSo;
use Illuminate\Database\Eloquent\Collection;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($maHK)
    {
        $lops = Lop::all();
        foreach($lops as $lop) {
           $qths =  $lop->QTH()->where('maHK', $maHK)->get();
           if ($qths === null) $lop->siSo = 0;
           else $lop->siSo = $qths->count();
        }
        return $lops;
    }
    public function getHocSinhCuaLop($maLop, $maHK)
    {
        $qll = QuanLyLop::where('maLop', $maLop)->where('maHK',$maHK)->get();
        $lop = Lop::find($maLop);
        if ($qll !== null && $qll->count() > 0) {
            $lop->tenLT = $qll[0]->HocSinh->hoTen;
            $lop->tenGVCN = $qll[0]->GiaoVien->hoTen;
        }


        $qths = $lop->QTH()->where('maHK',$maHK)->get();
        $hss = new Collection();
        foreach ($qths as $qth) {
            $hs = $qth->HocSinh;
            $hs->tenLop = $lop->tenLop;
            $hs->tinhTrangBaoHiem = $qth->baoHiem === 1 ? "Đã đóng" : "Chưa đóng";
            $hs->tinhTrangHocPhi = $qth->hocPhi === 1 ? "Đã đóng" : "Chưa đóng";
            $hs->hanhKiem = $qth->hanhKiem;

            $hs->diemTB = $qth->diemTB;
            $hs->maQTH = $qth->maQTH;
            $hss->add($hs);
        }
        $lop->hocSinh = $hss;
        return $lop;
    }

    public function addHocSinhVaoLop(Request $request, $maLop, $maHK)
    {
        $hss = new Collection();
        $qths = QuaTrinhHoc::where('maLop', $maLop)->where('maHK', $maHK)->get();
        if ($qths->count() + count(json_decode($request->maHS, true))  > ThamSo::find(3)->giaTri) {
            return response()->json(['message' => 'Bạn không thể thêm học sinh vượt quá sĩ số tối đa'], 422);
        }
        foreach (json_decode($request->maHS, true)  as $maHS)
        {
            $qth = new QuaTrinhHoc();
            $qth->maLop = $maLop;
            $qth->maHK = $maHK;
            $qth->maHS = $maHS;
            $qth->diemTB = -1;
            $qth->save();
            $hs = $qth->HocSinh;
            $hs->maQTH = $qth->maQTH;
            $hs->tenLop = $qth->Lop->tenLop;
            $hs->tinhTrangBaoHiem =  "Chưa đóng";
            $hs->tinhTrangHocPhi = "Chưa đóng";
            $hs->hanhKiem = "Tốt";

            $hs->diemTB = $qth->diemTB;
            $hss->add($hs);
        }
        return $hss;
    }
    public function xoaHocSinhKhoiLop(Request $request, $maLop, $maHK)
    {
        $qths = QuaTrinhHoc::where('maLop', $maLop)->where('maHK', $maHK)->get();
        foreach (json_decode($request->maHS, true)  as $maHS)
        {
            $delQths = $qths->where('maHS', $maHS)->first();
            if ($delQths->BangDiem()->count() > 0) {
                return response()->json(['message' => 'Bạn không thể xóa học sinh đã có bảng điểm'], 422);
            }
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
        if (Lop::all()->count() >= ThamSo::find(1)->giaTri) return response()->json(['message' => "Số lớp học đã đạt mức tối đa"], 422);
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
