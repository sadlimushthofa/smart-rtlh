<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    // protected $guarded = ['id'];
    protected $fillable = ['nama', 'nilai', 'id_kriteria'];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class, 'id_sub_kriteria');
    }

    public function sub_kriteria($id_kriteria)
    {
    $result = DB::table('sub_kriteria')
              ->where('id_kriteria', $id_kriteria)
              ->orderBy('id_kriteria', 'desc')
              ->get()
              ->toArray();
    return $result;
    }
}
