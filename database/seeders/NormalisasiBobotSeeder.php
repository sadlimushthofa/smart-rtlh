<?php

namespace Database\Seeders;

use App\Models\NormalisasiBobot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NormalisasiBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NormalisasiBobot::create([
            'nilai_normalisasi' => 86
        ]);

        NormalisasiBobot::create([
            'nilai_normalisasi' => 83
        ]);

        NormalisasiBobot::create([
            'nilai_normalisasi' => 80
        ]);

        NormalisasiBobot::create([
            'nilai_normalisasi' => 89
        ]);
    }
}
