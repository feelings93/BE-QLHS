<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TongKetMon extends Model
{
    protected $fillable = ['maMH', 'maLop', 'maHK', 'soLuongDat', 'tiLe', 'siSo'];
    protected $primaryKey = 'maTKM';
    public function Lop() {
        return $this->belongsTo('App\Lop', 'maLop', 'maLop');
    }
    public function HocKy() {
        return $this->belongsTo('App\HocKy', 'maHK', 'maHK');
    }
    public function MonHoc() {
        return $this->belongsTo('App\MonHoc', 'maMH', 'maMH');
    }
}
