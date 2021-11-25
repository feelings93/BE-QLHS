<?php

namespace App\Http\Controllers;

use App\HocKy;
use App\Lop;
use App\QuaTrinhHoc;
use App\ThamSo;
use App\TongKetHocKy;
use App\TongKetMon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TongKetHocKyController extends Controller
{
    public function getByForeign($maHK)
    {
        $tkhks = TongKetHocKy::where('maHK', $maHK)->get();
        return $tkhks;
    }
    public function getDatRot() {
        $hks = HocKy::all();
        // return TongKetHocKy::where('maHK', 1)->sum('soLuongDat');
        $namHocs = [];
        foreach($hks as $hk) {

            if (!in_array($hk->namHoc,$namHocs)) {
                array_push($namHocs, $hk->namHoc);

            }
        }
        $res = new Collection();
        foreach ($namHocs as $namHoc) {
            $hks = HocKy::where('namHoc', $namHoc)->get();
            $soLuongDat = 0;
            $siSo = 0;
            foreach ($hks as $hk) {
                $soLuongDat += TongKetHocKy::where('maHK', $hk->maHK)->sum('soLuongDat');

                $siSo += TongKetHocKy::where('maHK', $hk->maHK)->sum('siSo');

            }
            $eii = new TongKetMon();
            $eii->namHoc = $namHoc;
            $eii->soLuongDat = $soLuongDat;
            $eii->soLuongRot = $siSo - $soLuongDat;
            $res->push($eii);
        }
        return $res;
    }
    public function updateByForeign($maHK)
    {

        $lops = Lop::all();
        foreach($lops as $lop) {
            $qths = QuaTrinhHoc::where('maHK', $maHK)->where('maLop', $lop->maLop)->get();
            $sld = 0;
            // echo $lop->tenLop;
            foreach ($qths as $qth) {

            if ($qth->diemTB >= ThamSo::find(5)->giaTri) $sld++;

            }
            $tkhk = TongKetHocKy::where('maHK', $maHK)->where('maLop', $lop->maLop)->first();
            if ($tkhk === null) {
                 $tkhk = new TongKetHocKy();
                 $tkhk->maHK = $maHK;
                 $tkhk->maLop = $lop->maLop;
            }

            $tkhk->soLuongDat = $sld;
            $tkhk->siSo = $qths->count();

            if ($qths->count() === 0) {
                $tkhk->tiLe = 0;
            }
            else $tkhk->tiLe = $sld / $qths->count() * 100;
             $tkhk->save();
            // echo $tkhk;
            // echo $sld;
            // echo "/";
            // echo $qths->count();

        }
        return TongKetHocKy::where('maHK', $maHK)->get();

    }
}
