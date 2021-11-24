<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //

    protected $fillable = ['tenLop', 'maKhoi'];
    protected $primaryKey = 'maLop';
    public function QuanLyLop() {
        return $this->hasMany('App\QuanLyLop', 'maLop', 'maLop');
    }
    public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maLop', 'maLop');
    }
    public function Khoi() {

        return $this->belongsTo('App\Khoi', 'maKhoi', 'maKhoi');
    }
    public function TongKetHocKy() {
        return $this->hasMany('App\TongKetHocKy', 'maLop', 'maLop');
    }
    public function TongKetMon() {
        return $this->hasMany('App\TongKetHocKy', 'maLop', 'maLop');
    }
}
