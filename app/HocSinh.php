<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HocSinh extends Model
{
    //
    // use SoftDeletes;
    protected $fillable = ['hoTen', 'ngaySinh', 'gioiTinh', 'diaChi'];
    protected $primaryKey = 'maHS';
    protected $casts = [
    'ngaySinh' => 'datetime:d/m/Y', // Change your format
];
public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maHS', 'maHS');
    }
    public function QuanLyLop() {
        return $this->hasMany('App\QuanLyLop', 'maHS', 'maLopTruong');
    }
}
