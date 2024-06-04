@extends('layouts.app')

@section('title', 'Data Perhitungan')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Normalisasi Bobot Kriteria</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th>Kriteria</th>
                            <th>Nilai Bobot</th>
                            <th>Hasil Normalisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $key)
                        <tr align="center">
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->bobot }}</td>
                            @php
                            $total_bobot = app('App\Models\Perhitungan')->get_total_kriteria();
                            @endphp
                            <td>{{ $key->bobot / $totalBobot ?? 0 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Nilai Utility (U)</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $key)
                            <th>{{ $key->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($warga as $keys)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td align="left">{{ $keys->nama }}</td>
                            @foreach ($kriteria as $key)
                            <td>
                                @php
                                $data_pencocokan =
                                app('App\Models\Perhitungan')->data_nilai($keys->id,$key->id);
                                $min_max=app('App\Models\Perhitungan')->get_max_min($key->id);
                                $min_max = (object) $min_max; // ubah array menjadi objek
                                if (isset($min_max->max) && isset($min_max->min)) {
                                if ($min_max->max == $min_max->min) {
                                echo 0;
                                } else {
                                if ($key->jenis == "Benefit") {
                                echo @(($data_pencocokan->nilai-$min_max->min)/($min_max->max-$min_max->min));
                                } else {
                                echo @(($min_max->max-$data_pencocokan->nilai)/($min_max->max-$min_max->min));
                                }
                                }
                                } else {
                                echo 0;
                                }
                                @endphp
                            </td>
                            @endforeach
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Nilai</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Alternatif</th>
                            <th width="15%">Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_bobot = \App\Models\Perhitungan::get_total_kriteria();
                        foreach ($warga as $keys) {
                        ?>
                        <tr align="center">
                            <td>
                                {{ $no }}
                            </td>
                            <td align="left">
                                {{ $keys->nama }}
                            </td>
                            <?php
                                $nilai_total = 0;
                                foreach ($kriteria as $key) {
                                    $data_pencocokan = \App\Models\Perhitungan::data_nilai($keys->id, $key->id);
                                    $min_max = \App\Models\Perhitungan::get_max_min($key->id);

                                    if ($total_bobot['total_bobot'] != 0) {
                                        $bobot_normalisasi = $key->bobot / $totalBobot ?? 0;
                                    } else {
                                        $bobot_normalisasi = 0;
                                    }

                                    if ($min_max && $min_max['max'] != $min_max['min']) {
                                        if ($key->jenis == "Benefit") {
                                            $nilai_utility = @(($data_pencocokan->nilai - $min_max['min']) / ($min_max['max'] - $min_max['min']));
                                        } else {
                                            $nilai_utility = @(($min_max['max'] - $data_pencocokan->nilai) / ($min_max['max'] - $min_max['min']));
                                        }
                                    } else {
                                        $nilai_utility = 0;
                                    }

                                    $nilai_total += $bobot_normalisasi * $nilai_utility;
                                }
                                $hasil_akhir = [
                                    'id_warga' => $keys->id,
                                    'nilai' => $nilai_total
                                ];
                                \App\Models\Perhitungan::insert_hasil($hasil_akhir);
                                ?>
                            <td>
                                {{ $nilai_total }}
                            </td>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
