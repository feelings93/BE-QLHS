<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangDiem extends Model
{
    protected $fillable = ['maMH', 'maQTH', 'diemTBM'];
    protected $primaryKey = 'maBD';
}
