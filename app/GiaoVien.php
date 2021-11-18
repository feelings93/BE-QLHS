<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $fillable = [ 'hoTen'];
    protected $primaryKey = 'maGV';
    public function QuanLyLop() {
        return $this->hasMany('App\QuanLyLop', 'maGV', 'maGV');
    }
}
