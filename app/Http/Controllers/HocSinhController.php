<?php

namespace App\Http\Controllers;

use App\HocSinh;
use Illuminate\Http\Request;

class HocSinhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }//

    /**
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
        return HocSinh::all();

        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hocSinh = HocSinh::create($request->all());
        return $hocSinh;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HocSinh::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $maHS)
    {
        $hocSinh = HocSinh::find($maHS);
        if ($hocSinh) {
            $hocSinh->update($request->all());
          return $hocSinh;


        }
        else return response()->json('nnot found', 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       HocSinh::destroy($id);
        return response()->json(null, 204);
    }
}
