<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected $table = "hasil";
    protected $fillable = ['id_warga', 'nilai'];

}
