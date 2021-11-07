<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamSo extends Model
{
    protected $fillable = ['tenTS', 'giaTri'];
    protected $primaryKey = 'maTS';
}
