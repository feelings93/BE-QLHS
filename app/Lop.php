<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $fillable = ['tenLop', 'maKhoi'];
    protected $primaryKey = 'maLop';
    public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maLop', 'maLop');
    }
    public function Khoi() {

        return $this->belongsTo('App\Khoi', 'maKhoi', 'maKhoi');
    }

}
