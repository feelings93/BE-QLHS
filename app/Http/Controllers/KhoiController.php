<?php

namespace App\Http\Controllers;

use App\Khoi;
use Illuminate\Http\Request;

class KhoiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');

    }//
    public function index()
    {
        if (auth()->user()) {
        return Khoi::all();

        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function show($id)
    {
       $khoi = Khoi::find($id);
       if ($khoi === null) {
           return response()->json(['error' => 'Không tìm thấy học sinh'], 404);
       }
       $khoi->lop = json_encode($khoi->Lop);
       return $khoi;
    }
}
