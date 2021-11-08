<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietBangDiem extends Model
{
    protected $fillable = ['maLHKT', 'maBD', 'diem'];
    protected $primaryKey = 'maCTBD';
    public function BangDiem() {
        return $this->belongsTo('App\BangDiem', 'maBD', 'maBD');
    }
    public function LoaiHinhKiemTra() {
        return $this->belongsTo('App\LoaiHinhKiemTra', 'maLHKT', 'maLHKT');
    }
}
