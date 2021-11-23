<?php

namespace App\Http\Controllers;

use App\HocKy;
use Illuminate\Http\Request;

class HocKyController extends Controller
{
    //
    public function index() {
        return HocKy::all();
    }
}
