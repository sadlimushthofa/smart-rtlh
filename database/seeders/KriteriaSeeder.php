<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria::create([
            'nama' => 'Harga',
            'jenis' => 'Cost',
            'bobot' => 25
        ]);

        Kriteria::create([
            'nama' => 'Ongkir',
            'jenis' => 'Cost',
            'bobot' => 25
        ]);

        Kriteria::create([
            'nama' => 'Diskon',
            'jenis' => 'Benefit',
            'bobot' => 15
        ]);

        Kriteria::create([
            'nama' => 'Pengemasan',
            'jenis' => 'Benefit',
            'bobot' => 20
        ]);

        Kriteria::create([
            'nama' => 'Waktu',
            'jenis' => 'Cost',
            'bobot' => 15
        ]);
    }
}
