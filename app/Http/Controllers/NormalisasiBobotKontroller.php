<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\NormalisasiBobot;
use Illuminate\Http\Request;

class NormalisasiBobotKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    protected $bobotModel;

    public function __construct()
    {
        $this->model = new NormalisasiBobot();
        $this->bobotModel = new Bobot();
    }

    public function normalisasi(Request $request)
    {
        $total = 0;
        if ($request->ajax()) {
            // return response()->json([
            //     'name' => $request->kriteriaArray
            // ]);
            foreach ($request->kriteriaArray as $item) {
                $total+=$item["nilai_bobot"];
            }
            return response()->json([
                'total' => $total
            ]);       
        }

        $bobot = $this->bobotModel->getNilaiBobot();
        $nilaiBobot = array_column($bobot, 'nilai_bobot');
        $totalNilaiBobot = array_sum($nilaiBobot);

        $bobotTernormalisasi = [];
        foreach ($bobot as $item) {
            $nilaiNormalisasiBobot = ($item['nilai_bobot'] / $totalNilaiBobot);
            $data = [
                'id_bobot' => $item['id_bobot'],
                'nilai_normalisasi' => $nilaiNormalisasiBobot,
            ];

            array_push($bobotTernormalisasi, $data);
        }

        if (count($bobot) <= 0) {
            return response()->json(['status' => true, 'warning' => 'Belum ada data bobot kriteria']);
        }

        if (!$this->model->normalisasi($bobotTernormalisasi)) {
            return response()->json(['status' => false, 'errors' => $this->model->errors()]);
        } else {
            return response()->json(['status' => true, 'message' => 'Normalisasi bobot berhasil']);
        }
    }
    
     public function index()
    {
        //
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
        //
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
        //
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
        //
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
