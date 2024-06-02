<?php

namespace Database\Seeders;

use App\Models\Bobot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bobot::create([
            'id_kriteria' => 1,
            'nilai_bobot' => 86
        ]);

        Bobot::create([
            'id_kriteria' => 2,
            'nilai_bobot' => 83
        ]);

        Bobot::create([
            'id_kriteria' => 3,
            'nilai_bobot' => 80
        ]);

        Bobot::create([
            'id_kriteria' => 4,
            'nilai_bobot' => 89
        ]);
    }
}
