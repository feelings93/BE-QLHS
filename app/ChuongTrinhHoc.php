<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChuongTrinhHoc extends Model
{
    // use SoftDeletes;
    protected $fillable = ['maKhoi', 'maMH', 'heSo'];
    protected $primaryKey = 'maCTH';

    public function Khoi() {

        return $this->belongsTo('App\Khoi', 'maKhoi', 'maKhoi');
    }
    public function MonHoc() {

        return $this->belongsTo('App\MonHoc', 'maMH', 'maMH');
    }
}
