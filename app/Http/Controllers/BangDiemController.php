<?php

namespace App\Http\Controllers;

use App\Lop;
use App\QuaTrinhHoc;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BangDiemController extends Controller
{
    public function getBangDiem($maHK, $maLop, $maMH)
    {
    //    return Lop::find($maLop)->QTH->where('maHK', $maHK)->map(
    //         function ($item, $index, $maMH)
    //          {
    //              return $item->BangDiem;
    //          }
    //     );
        $qth =  QuaTrinhHoc::where('maLop', $maLop)->where('maHK', $maHK)->get();
        $res = new Collection([]);
        foreach($qth as $qthItem) {
            $bangDiem = $qthItem->BangDiem->where('maMH', $maMH);
            foreach($bangDiem as $bangDiemItem) {
                $bangDiemItem->hoTen = $bangDiemItem->QuaTrinhHoc->HocSinh->hoTen;

                $bangDiemItem->heSo1 = $bangDiemItem->ChiTietBangDiem->where('maLHKT', 1)->map(
                    function ($item) {
                        return $item-> diem;
                    }
                );
                $bangDiemItem->heSo2 = $bangDiemItem->ChiTietBangDiem->where('maLHKT', 2)->map(
                    function ($item) {
                        return $item-> diem;
                    }
                );
                $bangDiemItem->heSo3 = $bangDiemItem->ChiTietBangDiem->where('maLHKT', 3)->map(
                    function ($item) {
                        return $item-> diem;
                    }
                );
            }
            $res->add($bangDiem);
        }
        return $res;

    }
}
