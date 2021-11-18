<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomNguoiDung extends Model
{
    //
    protected $primaryKey = 'maNhom';
    public function User() {
        return $this->hasMany('App\User', 'maNhom', 'maNhom');
    }
}
