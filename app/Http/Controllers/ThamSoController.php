<?php

namespace App\Http\Controllers;

use App\ThamSo;
use Illuminate\Http\Request;

class ThamSoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');

    }//
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $ts = ThamSo::find($id);
       if ($ts != null) {
           return $ts;
       }
       else return response()->json(['message'=> 'Không thấy tham số này'], 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ts = ThamSo::find($id);
        if ($ts == null) {
           return response()->json(['message'=> 'Không thấy tham số này'], 404);
       }
       $ts->giaTri = $request->giaTri;
       $ts->save();
       return response()->json(['message '=> 'Cập nhật thành công'], 200);
    }
}
