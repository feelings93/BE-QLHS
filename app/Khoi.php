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

}
