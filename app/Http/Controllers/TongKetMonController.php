<?php

namespace App\Http\Controllers;

use App\BangDiem;
use App\Lop;
use App\QuaTrinhHoc;
use App\TongKetMon;
use Illuminate\Http\Request;

class TongKetMonController extends Controller
{


    public function getByForeign($maHK, $maMH )
    {
        $tkms = TongKetMon::where('maHK', $maHK)->where('maMH', $maMH)->get();
        return $tkms;
    }
    public function updateByForeign($maHK,  $maMH)
    {
        // $tkms = TongKetMon::where('maHK', $maHK)->where('maLop', $maLop)->where('maMH', $maMH)->get();
        $lops = Lop::all();
        foreach($lops as $lop) {
            $qths = QuaTrinhHoc::where('maHK', $maHK)->where('maLop', $lop->maLop)->get();
            $sld = 0;
            // echo $lop->tenLop;
            foreach ($qths as $qth) {
            // echo $qth;
            $bd = BangDiem::where('maQTH', $qth->maQTH)->where('maMH', $maMH)->first();
            if ($bd === null) continue;
            // echo $bd;
            if ($bd->diemTBM >= $bd->MonHoc->diemDat) $sld++;

            }
            $tkm = TongKetMon::where('maHK', $maHK)->where('maLop', $lop->maLop)->where('maMH', $maMH)->first();
            if ($tkm === null) {
                 $tkm = new TongKetMon();
                 $tkm->maMH =$maMH;
                 $tkm->maHK = $maHK;
                 $tkm->maLop = $lop->maLop;
            }

            $tkm->soLuongDat = $sld;
            $tkm->siSo = $qths->count();

            if ($qths->count() === 0) {
                $tkm->tiLe = 0;
            }
            else $tkm->tiLe = $sld / $qths->count() * 100;
            $tkm->save();
            // echo $tkm;
            // echo $sld;
            // echo "/";
            // echo $qths->count();

        }
        $tkms = TongKetMon::where('maHK', $maHK)->where('maMH', $maMH)->get();
        return $tkms;
    }

}
