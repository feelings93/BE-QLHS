<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangDiem extends Model
{
    protected $fillable = ['maMH', 'maQTH', 'diemTBM'];
    protected $primaryKey = 'maBD';
    public function ChiTietBangDiem() {
        return $this->hasMany('App\ChiTietBangDiem', 'maBD', 'maBD');
    }
    public function MonHoc() {
        return $this->belongsTo('App\MonHoc', 'maMH', 'maMH');
    }
    public function QuaTrinhHoc() {
        return $this->belongsTo('App\QuaTrinhHoc', 'maQTH', 'maQTH');
    }
}
