<?php

namespace App\Http\Controllers;
use App\Models\Databarang;
use App\Models\Jenis;
use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Databarang::get();
        $jenis = Jenis::get();
        $satuan = Satuan::get();
        $kategori = Kategori::get();

        return view('data.index', compact('data','jenis','satuan','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::get();
        $satuan = Satuan::get();
        $kategori = Kategori::get();
        return view('data.create', compact('jenis','satuan','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namabrg'=>'required',
            'jenis_id'=>'required',
            'stok'=>'required',
            'satuan_id'=>'required',
            'kategori_id'=>'required',
            ]);

                $data = Databarang::create([
                    'namabrg' => $request->input('namabrg'),
                    'jenis_id' => $request->input('jenis_id'),
                    'stok' => $request->input('stok'),
                    'satuan_id' => $request->input('satuan_id'),
                    'kategori_id' => $request->input('kategori_id')
                    ]);
                    return redirect('data')->with('success','News telah disimpan!');
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
        $jenis = Jenis::get();
        return view('data.edit', compact('data', 'jenis'));
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
        $request->validate([
            'namabrg'=>'required',
            'jenis_id'=>'required',
            'stok'=>'required',
            'satuan_id'=>'required',
            'kategori_id'=>'required',
            ]);

            $data = Databarang::find($id)->update([
                    'namabrg' => $request->input('namabrg'),
                    'jenis_id' => $request->input('jenis_id'),
                    'stok' => $request->input('stok'),
                    'satuan_id' => $request->input('satuan_id'),
                    'kategori_id' => $request->input('kategori_id')
                    ]);
                    return redirect('/news')->with('success','News telah disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}