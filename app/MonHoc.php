<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonHoc extends Model
{
    // use SoftDeletes;
    protected $fillable = ['tenMH', 'diemDat'];
    protected $primaryKey = 'maMH';
    public function ChuongTrinhHoc() {
        return $this->hasMany('App\ChuongTrinhHoc', 'maMH', 'maMH');
    }
    public function TongKetMon() {
        return $this->hasMany('App\TongKetMon', 'maMH', 'maMH');
    }
    public function BangDiem() {
        return $this->hasMany('App\BangDiem', 'maMH', 'maMH');
    }
}
