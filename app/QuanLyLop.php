<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyLop extends Model
{
    protected $fillable = [ 'maLop', 'maGV', 'maHK', 'maLopTruong'];
    protected $primaryKey = 'maQLL';
    public function Lop() {
        return $this->belongsTo('App\Lop', 'maLop', 'maLop');
    }
    public function HocSinh() {
        return $this->belongsTo('App\HocSinh','maLopTruong' ,  'maHS');
    }
    public function HocKy() {
        return $this->belongsTo('App\HocKy', 'maHK', 'maHK');
    }
    public function GiaoVien() {
        return $this->belongsTo('App\GiaoVien', 'maGV', 'maGV');
    }
}
