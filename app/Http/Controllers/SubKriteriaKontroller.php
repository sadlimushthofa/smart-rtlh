<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subkriteria = SubKriteria::get();

        // return view('subkriteria.index', ['subkriteria'=>$subkriteria]);

        $subkriteria = SubKriteria::all()->sortBy('id_kriteria');
        $kriteria = Kriteria::all();

        return response()->view('subkriteria.index', compact('subkriteria', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $kriteria = Kriteria::get();

        return view('subkriteria.form', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'id_kriteria' => $request->id_kriteria,
        ];

        SubKriteria::create($data);

        return redirect()->route('subkriteria')->with('success', 'Data Sub Kriteria berhasil disimpan');
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
        $subkriteria = SubKriteria::find($id);
        $kriteria = Kriteria::get();

        return view('subkriteria.form', compact('subkriteria', 'kriteria'));
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
        $data = [
            'nama' => $request->nama,
            'id_kriteria' => $request->id_kriteria,
            'nilai' => $request->nilai,
        ];

        SubKriteria::find($id)->update($data);

        return redirect()->route('subkriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        subkriteria::find($id)->delete();

        return redirect()->route('subkriteria');
    }
}
