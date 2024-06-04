<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    public static function get_total_kriteria()
    {
        $query = DB::select("SELECT SUM(bobot) as total_bobot FROM kriteria;");
        return (array) $query[0];
    }

    public static function get_warga()
    {
        $query = DB::table('warga')->get();
        return $query->toArray();
    }

    public static function data_nilai($id_warga, $id_kriteria)
    {
    $query = DB::table('alternatif')
        ->join('sub_kriteria', 'alternatif.nilai', '=', 'sub_kriteria.id')
        ->join('kriteria', 'alternatif.id_kriteria', '=', 'kriteria.id')
        ->where('alternatif.id_warga', '=', $id_warga)
        ->where('alternatif.id_kriteria', '=', $id_kriteria);

    $query->select('sub_kriteria.*');

    return $query->first();
    }

    public static function get_max_min($id_kriteria)
    {
    $query = DB::table('alternatif')
        ->join('kriteria', 'alternatif.id_kriteria', '=', 'kriteria.id')
        ->join('sub_kriteria', 'alternatif.nilai', '=', 'sub_kriteria.id')
        ->where('alternatif.id_kriteria', '=', $id_kriteria);

    $query->selectRaw('MAX(sub_kriteria.nilai) as max, MIN(sub_kriteria.nilai) as min, kriteria.jenis as jenis')
        ->groupBy('kriteria.jenis');

    $result = $query->first();

    if ($result) {
        return (array) $result;
    } else {
        return ['min' => 0, 'max' => 0];
    }
    }

    public static function insert_hasil($hasil_akhir = [])
    {
    $existingData = DB::table('hasil')
                      ->where('id_warga', $hasil_akhir['id_warga'])
                      ->first();

    if ($existingData) {
        // Data already exists, perform update instead of insert
        $result = DB::table('hasil')
                    ->where('id_warga', $hasil_akhir['id_warga'])
                    ->update($hasil_akhir);
    } else {
        // Data does not exist, perform insert
        $result = DB::table('hasil')->insert($hasil_akhir);
    }

    return $result;
    }
}
