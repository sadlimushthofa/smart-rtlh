<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class AlternatifKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::all();
        $subkriteria = SubKriteria::all();


        return view('alternatif.index', ['alternatif'=>$alternatif], compact('kriteria', 'subkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {

        $kriteria = Kriteria::get();

        return view('alternatif.form', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        // $data = [
        //     'nama' => $request->nama,
        //     'prestasi' => $request->prestasi,
        //     'hafalan' => $request->hafalan,
        // ];

        // Alternatif::create($data);
        $id_kriteria = $request->input('id_kriteria');
        $nilai = $request->input('nilai');
        $i = 0;

        foreach ($nilai as $key) {
            $alternatif = Alternatif::firstOrCreate(
                ['id_kriteria' => $id_kriteria[$i]],
                ['nilai' => $key, 'created_at' => now()]
            );
            $i++;
        }

        return redirect()->route('alternatif');
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
        $alternatif = Alternatif::find($id);

        return view('alternatif.form', ['alternatif' => $alternatif]);
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
            'prestasi' => $request->prestasi,
            'hafalan' => $request->hafalan,
        ];

        Alternatif::find($id)->update($data);

        return redirect()->route('alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        Alternatif::find($id)->delete();

        return redirect()->route('alternatif');
    }
}
