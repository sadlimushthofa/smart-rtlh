<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';
    // protected $guarded = ['id'];
    protected $fillable = ['id_kriteria','nilai', 'id_warga', 'id_sub_kriteria'];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function subkriteria() {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria');
    }

    public function warga() {
        return $this->belongsTo(Warga::class, 'id_warga');
    }

    public static function get_warga()
    {
        $query = DB::table('warga')->get();
        return $query->toArray();
    }

    public static function sub_kriteria($id)
    {
    $sub_kriteria = DB::table('sub_kriteria')
                    ->where('id_kriteria', $id)
                    ->orderBy('nilai', 'desc')
                    ->get();
    return $sub_kriteria->toArray();
    }

    public static function nama_warga($id)
    {
    $nama_warga = DB::table('warga')
                    ->where('id', $id)
                    ->orderBy('nama', 'desc')
                    ->get();
    return $nama_warga->toArray();
    }

    public static function simpan($id_warga, $id_kriteria, $nilai)
    {
    $query = DB::table('alternatif')->insert([
        'id_warga' => $id_warga,
        'id_kriteria' => $id_kriteria,
        'nilai' => $nilai,
    ]);
    return $query;
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
}
