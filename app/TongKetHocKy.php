<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TongKetHocKy extends Model
{
    protected $fillable = ['maLop', 'maHK', 'soLuongDat', 'tiLe', 'siSo'];
    protected $primaryKey = 'maTKHK';
    public function Lop() {
        return $this->belongsTo('App\Lop', 'maLop', 'maLop');
    }
    public function HocKy() {
        return $this->belongsTo('App\HocKy', 'maHK', 'maHK');
    }
}
