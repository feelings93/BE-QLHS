<?php

namespace App\Http\Controllers;

use App\GiaoVien;
use App\QuanLyLop;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class QuanLyLopController extends Controller
{
    public function getGVTrong($maHK) {
        $qlls = QuanLyLop::where('maHK', $maHK)->get();
        $maGVDaChuNhiem = [];

        if ($qlls === null) return [];
        foreach ($qlls as $qll) {
            if ($qll->GiaoVien !== null)
            array_push($maGVDaChuNhiem, $qll->GiaoVien->maGV);
        }
        return GiaoVien::all()->except($maGVDaChuNhiem);
    }
    public function updateCanBo(Request $request) {
        $qlls = QuanLyLop::where('maLop', $request->maLop)->where('maHK', $request->maHK)->get();

        if ($qlls === null ||  $qlls->count() === 0 ) {
            $qll = new QuanLyLop();
            $qll->maLop = $request->maLop;
            $qll->maHK = $request->maHK;
            $qll->maLopTruong = $request->maLT;
            $qll->maGV = $request->maGVCN;
            $qll->save();
            return $qll;

        }
        else {
             $qlls[0]->maLopTruong = $request->maLT;
            $qlls[0]->maGV = $request->maGVCN;
            $qlls[0]->save();
            return \response()->json(["message" => "Cập thành thành công"], 200);
        }

    }
}
