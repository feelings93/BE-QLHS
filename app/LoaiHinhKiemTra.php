<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiHinhKiemTra extends Model
{
    protected $fillable = ['tenLHKT', 'heSoDiem', 'thoiGianKiemTra'];
    protected $primaryKey = 'maLHKT';
    public function ChiTietBangDiem() {
        return $this->hasMany('App\ChiTietBangDiem', 'maLHKT', 'maLHKT');
    }
}
