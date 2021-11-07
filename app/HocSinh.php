<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    //
    protected $fillable = ['hoTen', 'ngaySinh', 'gioiTinh', 'diaChi'];
    protected $primaryKey = 'maHS';
    protected $casts = [
    'ngaySinh' => 'datetime:d/m/Y', // Change your format
];
public function QTH() {
        return $this->hasMany('App\QuaTrinhHoc', 'maHS', 'maHS');
    }
}
