<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Warga;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

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
        $subkriteria = SubKriteria::get();
        $warga = Alternatif::get_warga();


        return view('alternatif.index', ['alternatif'=>$alternatif], compact('kriteria', 'subkriteria', 'warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {

        $kriteria = Kriteria::get();
        $warga = Warga::get();

        return view('alternatif.form', compact('kriteria', 'warga'));
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
        $id_warga = $request->input('id_warga');
        $nilai = $request->input('nilai');
        $i = 0;

        foreach ($nilai as $key) {
            $alternatif = Alternatif::firstOrCreate(
                ['id_kriteria' => $id_kriteria[$i], 'id_warga' => $id_warga],
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
        $kriteria = Kriteria::get();
        $warga = Warga::get();
        $subkriteria = SubKriteria::get();

        return view('alternatif.form', compact('alternatif', 'warga', 'subkriteria', 'kriteria'));
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
