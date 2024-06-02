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
    protected $fillable = ['id_kriteria','nilai'];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public static function sub_kriteria($id)
    {
    $sub_kriteria = DB::table('sub_kriteria')
                    ->where('id_kriteria', $id)
                    ->orderBy('nilai', 'desc')
                    ->get();
    return $sub_kriteria->toArray();
    }
}
