<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuongTrinhHoc extends Model
{
    protected $fillable = ['maKhoi', 'maMH', 'heSo'];
    protected $primaryKey = 'maCTH';

    public function Khoi() {

        return $this->belongsTo('App\Khoi', 'maKhoi', 'maKhoi');
    }
    public function MonHoc() {

        return $this->belongsTo('App\MonHoc', 'maMH', 'maMH');
    }
}
