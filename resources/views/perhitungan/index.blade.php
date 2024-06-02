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
@endsection
