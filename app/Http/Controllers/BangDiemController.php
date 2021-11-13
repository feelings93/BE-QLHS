<?php

namespace App\Http\Controllers;

use App\BangDiem;
use App\ChiTietBangDiem;
use App\HocKy;
use App\Lop;
use App\MonHoc;
use App\QuaTrinhHoc;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BangDiemController extends Controller
{
    public function getBangDiem($maHK, $maLop, $maMH)
    {
        $qth =  QuaTrinhHoc::where('maLop', $maLop)->where('maHK', $maHK)->get();
        $res = new Collection([]);
        foreach($qth as $qthItem) {
            $bangDiem = $qthItem->BangDiem->where('maMH', $maMH)->first();
            $newBD = new BangDiem();
            $newBD->maQTH = $qthItem->maQTH;
            $newBD->maHS = $qthItem->HocSinh->maHS;
            $newBD->hoTen = $qthItem->HocSinh->hoTen;
            $newBD->tenLop = $qthItem->Lop->tenLop;
            if ($bangDiem === null) {
                $newBD->diemTBM = -1;
                $newBD->diemMieng = [];
                $newBD->diem15P = [];
                $newBD->diem1Tiet = [];
                $newBD->diemHK = [];
            }
            else {
                $newBD->maBD = $bangDiem->maBD;
                $newBD->diemTBM = $bangDiem->diemTBM;

                $newBD->diemMieng = $bangDiem->ChiTietBangDiem()->where('maLHKT', 1)->get()->map(
                        function ($item) {
                            return $item-> diem;
                        }
                );
                $newBD->diem15P = $bangDiem->ChiTietBangDiem()->where('maLHKT', 2)->get()->map(
                        function ($item) {
                            return $item-> diem;
                        }
                );
                $newBD->diem1Tiet = $bangDiem->ChiTietBangDiem()->where('maLHKT', 3)->get()->map(
                        function ($item) {
                            return $item-> diem;
                        }
                );
                $newBD->diemHK = $bangDiem->ChiTietBangDiem()->where('maLHKT', 4)->get()->map(
                        function ($item) {
                            return $item-> diem;
                        }
                );
            }


            $res->add($newBD);
        }
        return $res;

    }
    public function themBangDiem(Request $request) {
        $bd = new BangDiem();
        $bd->maQTH = $request->maQTH;
        $bd->maMH = $request->maMH;
        $bd->diemTBM = -1;

        $bd->save();
        $diemMiengs = json_decode($request->diemMieng, true);
        $diem15Ps = json_decode($request->diem15P, true);
        $diem1Tiets = json_decode($request->diem1Tiet, true);
        $diemHKs = json_decode($request->diemHK, true);
        $tongHeSo = 0;
        $tongDiem = 0;
        foreach($diemMiengs as $diemMieng) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diemMieng;
            $ctbd->maBD = $bd->maBD;
            $ctbd->maLHKT = 1;
            $ctbd->save();
            $tongDiem += $ctbd->diem;
            $tongHeSo++;
        }
        foreach($diem15Ps as $diem15P) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diem15P;
            $ctbd->maBD = $bd->maBD;
            $ctbd->maLHKT = 2;
             $ctbd->save();
             $tongDiem += $ctbd->diem;
            $tongHeSo++;

        }
        foreach($diem1Tiets as $diem1Tiet) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diem1Tiet;
            $ctbd->maBD = $bd->maBD;
            $ctbd->maLHKT = 3;
             $ctbd->save();
             $tongDiem += $ctbd->diem * 2;
            $tongHeSo += 2;

        }
        foreach($diemHKs as $diemHK) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diemHK;
            $ctbd->maBD = $bd->maBD;
            $ctbd->maLHKT = 4;
             $ctbd->save();
             $tongDiem += $ctbd->diem * 3;
            $tongHeSo += 3;

        }
        if ($bd->ChiTietBangDiem()->count() === 0) $bd->diemTBM = -1;
        else $bd->diemTBM = $tongDiem/$tongHeSo;
        $bd->save();
        return response()->json(['message'=> 'Cập nhật bảng điểm thành công'], 200);
    }
    public function suaBangDiem(Request $request, $id) {
        $bd = BangDiem::find($id);
        if ($bd === null) {
            return response()->json(['message'=> 'Không tìm thấy bảng điểm này'], 404);
        }
        $diemMiengs = json_decode($request->diemMieng, true);
        $diem15Ps = json_decode($request->diem15P, true);
        $diem1Tiets = json_decode($request->diem1Tiet, true);
        $diemHKs = json_decode($request->diemHK, true);
        $bd->ChiTietBangDiem()->delete();
        $tongHeSo = 0;
        $tongDiem = 0;
        foreach($diemMiengs as $diemMieng) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diemMieng;
            $ctbd->maBD = $id;
            $ctbd->maLHKT = 1;
            $ctbd->save();
            $tongDiem += $ctbd->diem;
            $tongHeSo++;
        }
        foreach($diem15Ps as $diem15P) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diem15P;
            $ctbd->maBD = $id;
            $ctbd->maLHKT = 2;
             $ctbd->save();
             $tongDiem += $ctbd->diem;
            $tongHeSo++;

        }
        foreach($diem1Tiets as $diem1Tiet) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diem1Tiet;
            $ctbd->maBD = $id;
            $ctbd->maLHKT = 3;
             $ctbd->save();
             $tongDiem += $ctbd->diem * 2;
            $tongHeSo += 2;

        }
        foreach($diemHKs as $diemHK) {
            $ctbd = new ChiTietBangDiem();
            $ctbd->diem = $diemHK;
            $ctbd->maBD = $id;
            $ctbd->maLHKT = 4;
             $ctbd->save();
             $tongDiem += $ctbd->diem * 3;
            $tongHeSo += 3;

        }
        if ($bd->ChiTietBangDiem()->count() === 0) $bd->diemTBM = -1;
        else $bd->diemTBM = $tongDiem/$tongHeSo;
        $bd->save();
        return response()->json(['message'=> 'Cập nhật bảng điểm thành công'], 200);
    }
    public function getLopHKMH()
    {

        $lops = Lop::all();
        $mhs = MonHoc::all();
        $hks = HocKy::all();
        return response()->json(
            ['lop' => $lops,'monHoc' => $mhs, 'hocKy' => $hks ], 200
        );

    }
}
