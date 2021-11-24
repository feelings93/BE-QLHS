<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhHoc extends Model
{
    // use SoftDeletes;
    protected $fillable = [ 'maLop', 'maHS', 'maHK', 'diemTB', 'hanhKiem', 'baoHiem', 'hocPhi'];
    protected $primaryKey = 'maQTH';
    public function Lop() {
        return $this->belongsTo('App\Lop', 'maLop', 'maLop');
    }
    public function HocSinh() {
        return $this->belongsTo('App\HocSinh', 'maHS', 'maHS');
    }
    public function HocKy() {
        return $this->belongsTo('App\HocKy', 'maHK', 'maHK');
    }
    public function BangDiem() {
        return $this->hasMany('App\BangDiem', 'maQTH', 'maQTH');
    }
}

