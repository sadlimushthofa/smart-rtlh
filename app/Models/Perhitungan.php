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
}
