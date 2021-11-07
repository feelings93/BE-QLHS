<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhHoc extends Model
{
    protected $fillable = [ 'maLop', 'maHS', 'maHK', 'diemTB'];
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
}
