<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    protected $fillable = ['tenHK', 'namHoc'];
    protected $primaryKey = 'maHK';
    public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maHK', 'maHK');
    }
}
