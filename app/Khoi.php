<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoi extends Model
{
    protected $fillable = ['tenKhoi'];
    protected $primaryKey = 'maKhoi';
    public function Lop() {
        return $this->hasMany('App\Lop', 'maKhoi', 'maKhoi');
    }
    public function ChuongTrinhHoc() {
        return $this->hasMany('App\ChuongTrinhHoc', 'maKhoi', 'maKhoi');
    }

}
