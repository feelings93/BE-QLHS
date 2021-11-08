<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $fillable = ['tenMH', 'diemDat'];
    protected $primaryKey = 'maMH';
    public function ChuongTrinhHoc() {
        return $this->hasMany('App\ChuongTrinhHoc', 'maMH', 'maMH');
    }
    public function TongKetMon() {
        return $this->hasMany('App\TongKetMon', 'maMH', 'maMH');
    }
}
