<?php

namespace App\Http\Controllers;

use App\Lop;
use App\QuaTrinhHoc;
use App\ThamSo;
use App\TongKetHocKy;
use Illuminate\Http\Request;

class TongKetHocKyController extends Controller
{
    public function getByForeign($maHK)
    {
        $tkhks = TongKetHocKy::where('maHK', $maHK)->get();
        return $tkhks;
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
                $tkhk->tiLe = 100;
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
