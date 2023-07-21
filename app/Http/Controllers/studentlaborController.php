<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentlabor;

class studentlaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentlabor = studentlabor::latest()->get();
        return view('studentlabor.index', compact('studentlabor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentlabor = studentlabor::find($id)->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'pekerjaan_id' => $request->input('pekerjaan_id'),
            'jurusan' => $request->input('jurusan'),
            'tingkat' => $request->input('tingkat'),
            'nohp' => $request->input('nohp')
        ]);
        return redirect('/studentlabor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentlabor = studentlabor::create([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'pekerjaan_id' => $request->input('pekerjaan_id'),
            'jurusan' => $request->input('jurusan'),
            'tingkat' => $request->input('tingkat'),
            'nohp' => $request->input('nohp')
        ]);
        return redirect('/studentlabor');
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
        $studentlabor = studentlabor::find($id);
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
        $studentlabor = studentlabor::find($id)->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'pekerjaan_id' => $request->input('pekerjaan_id'),
            'jurusan' => $request->input('jurusan'),
            'tingkat' => $request->input('tingkat'),
            'nohp' => $request->input('nohp')
        ]);
        return redirect('/studentlabor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentlabor = studentlabor::find($id);
        $studentlabor->delete();
        return redirect('/studentlabor');
    }
}
