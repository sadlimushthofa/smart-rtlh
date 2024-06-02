<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\NormalisasiBobot;
use Illuminate\Http\Request;

class BobotKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bobot = Bobot::with('kriteria');

        // return view('bobot.index', ['bobot'=>$bobot]);
        $bobot = Bobot::all();
        $kriteria = Kriteria::all();
        $normalisasi_bobot = NormalisasiBobot::all();
        // dd($normalisasi_bobot);

        return response()->view('bobot.index', compact('bobot', 'normalisasi_bobot', 'kriteria'));
        // $bobot = Bobot::get();

		// return view('bobot.index', ['bobot' => $bobot]);
    }

    // protected $model;
    // protected $kriteriaModel;
    // protected $normalisasiBobotModel;

    // public function __construct()
    // {
    //     $this->model = new Bobot();
    //     $this->kriteriaModel = new Kriteria();
    //     $this->normalisasiBobotModel = new NormalisasiBobot();
    // }

    // public function index()
    // {
    //     $bobot = Bobot::all()->toArray();
    //     $normalisasiBobot = NormalisasiBobot::all()->toArray();
    //     $kriteriaModel = Kriteria::all()->toArray();

    //     if (count($bobot) > 0 && count($normalisasiBobot) > 0) {
    //         $jmlNilaiBobot = count($bobot);
    //         $jmlNilaiBobotTernormalisasi = count($normalisasiBobot);

    //         if ($jmlNilaiBobot !== $jmlNilaiBobotTernormalisasi) {
    //             $normalisasiBobot = [];
    //         }
    //     }

    //     $data = [
    //         'bobot' => $bobot,
    //         'kriteria' => $this->kriteriaModel->getCriteria(),
    //         'normalisasi_bobot' => $normalisasiBobot,
    //     ];

    //     return view('bobot.index', $data);
    // }

    // public function normalisasi(){
    //     $bobot = Bobot::all();
    //     dd($bobot);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $kriteria = Kriteria::get();

        return view('bobot.form', compact('kriteria'));
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
            'nilai_bobot' => $request->nilai_bobot,
            'id_kriteria' => $request->id_kriteria,
        ];

        Bobot::create($data);
        
        return redirect()->route('bobot');
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
        $bobot = Bobot::find($id);
        $kriteria = Kriteria::get();
        $normalisasi_bobot = NormalisasiBobot::get();

        return view('bobot.form', compact('bobot', 'kriteria', 'normalisasi_bobot'));
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
            'nilai_bobot' => $request->nilai_bobot,
            'id_kriteria' => $request->id_kriteria,
        ];

        Bobot::find($id)->update($data);
        
        return redirect()->route('bobot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        bobot::find($id)->delete();
        
        return redirect()->route('bobot');
    }
}
