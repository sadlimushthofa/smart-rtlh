<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $table = 'bobot';
    // protected $guarded = ['id'];
    protected $fillable = ['nilai_bobot', 'id_kriteria'];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    // public function normalisasi_bobot(){
    //     return $this->belongsTo(NormalisasiBobot::class, 'id_normalisasi');
    // }

    public function normalisasi_bobot(){
        return $this->hasOne(NormalisasiBobot::class, 'id_bobot');
    }
}
