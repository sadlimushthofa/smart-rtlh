<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKriteria::create([
            'id_kriteria' => 1,
            'nama' => 'Sangat Murah',
            'nilai' => 5
        ]);

        SubKriteria::create([
            'id_kriteria' => 1,
            'nama' => 'Murah',
            'nilai' => 4
        ]);

        SubKriteria::create([
            'id_kriteria' => 1,
            'nama' => 'Cukup',
            'nilai' => 3
        ]);

        SubKriteria::create([
            'id_kriteria' => 1,
            'nama' => 'Mahal',
            'nilai' => 2
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama' => '10000 Kg',
            'nilai' => 5
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama' => '20000 Kg',
            'nilai' => 4
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama' => '50000 Kg',
            'nilai' => 3
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama' => '90000 Kg',
            'nilai' => 2
        ]);

        SubKriteria::create([
            'id_kriteria' => 3,
            'nama' => 'Diskon Besar',
            'nilai' => 5
        ]);

        SubKriteria::create([
            'id_kriteria' => 3,
            'nama' => 'Diskon Kecil',
            'nilai' => 4
        ]);

        SubKriteria::create([
            'id_kriteria' => 3,
            'nama' => 'Tidak Ada Diskon',
            'nilai' => 3
        ]);

        SubKriteria::create([
            'id_kriteria' => 4,
            'nama' => 'Baik',
            'nilai' => 5
        ]);

        SubKriteria::create([
            'id_kriteria' => 4,
            'nama' => 'Cukup',
            'nilai' => 4
        ]);

        SubKriteria::create([
            'id_kriteria' => 4,
            'nama' => 'Kurang',
            'nilai' => 3
        ]);

        SubKriteria::create([
            'id_kriteria' => 5,
            'nama' => 'Cepat',
            'nilai' => 5
        ]);

        SubKriteria::create([
            'id_kriteria' => 5,
            'nama' => 'Cukup',
            'nilai' => 4
        ]);

        SubKriteria::create([
            'id_kriteria' => 5,
            'nama' => 'Lambat',
            'nilai' => 3
        ]);
    }
}
