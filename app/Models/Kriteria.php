<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    // protected $guarded = ['id'];
    protected $fillable = ['nama','bobot', 'jenis'];

    public function bobot(){
        return $this->hasOne(Bobot::class, 'id_kriteria');
    }

    public function subkriteria(){
        return $this->hasMany(SubKriteria::class, 'id_kriteria');
    }

    public function alternatif()
    {
    return $this->hasMany(Alternatif::class, 'id_kriteria');
    }
    // public function bobot(){
    //     return $this->belongsTo(Bobot::class);
    // }
    // public function subkriteria(){
    //     return $this->belongsTo(SubKriteria::class);
    // }
}
