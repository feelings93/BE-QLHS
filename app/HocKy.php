<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    protected $fillable = ['tenHK', 'namHoc'];
    protected $primaryKey = 'maHK';
    public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maHK', 'maHK');
    }
    public function QuanLyLop() {
        return $this->hasMany('App\QuanLyLop', 'maHK', 'maHK');
    }
    public function TongKetHocKy() {
        return $this->hasMany('App\TongKetHocKy', 'maHK', 'maHK');
    }
    public function TongKetMon() {
        return $this->hasMany('App\TongKetMon', 'maHK', 'maHK');
    }
}
