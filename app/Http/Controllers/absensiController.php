<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;
use App\Models\Shift;
use App\Models\studentlabor;

class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = absensi::get();
        $shift = Shift::get();
        $studentlabor = studentlabor::get();
        return view('absensi.index', compact('absensi', 'shift', 'studentlabor'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/absensi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absensi = absensi::create([
            'nama_id' => $request->input('nama_id'),
            'status' => $request->input('status'),
            'tanggal' => $request->input('tanggal'),
            'shift_id' => $request->input('shift_id'),


        ]);
        return redirect('/absensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = absensi::find($id);
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
        $absensi = absensi::find($id)->update([
            'nama_id' => $request->input('nama_id'),
            'status' => $request->input('status'),
            'tanggal' => $request->input('tanggal'),
            'shift_id' => $request->input('shift_id'),

        ]);
        return redirect('/absensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = absensi::find($id);
        $absensi->delete();
        return redirect('/absensi');
    }
}
