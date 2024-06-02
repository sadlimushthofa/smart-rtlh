<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalisasiBobot extends Model
{
    use HasFactory;
    protected $table = 'normalisasi_bobot';
    protected $fillable = ['nilai_normalisasi', 'id_bobot'];

    public function bobot(){
        return $this->belongsTo(Bobot::class, 'id_bobot');
    }

    // public function bobot(){
    //     return $this->hasOne(Bobot::class, 'id_normalisasi');
    // }
}
