@extends('layouts.app')

@section('title', 'Data Sub Kriteria')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Kriteria</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('subkriteria.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa fa-plus"></i> Tambah Sub Kriteria</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Sub Kriteria</th>
                            <th>Nilai Preferensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($subkriteria as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->kriteria->nama }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nilai }}</td>
                            <td>
                                <a href="{{ route('subkriteria.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa fa-edit"></i> Edit</a>
                                <a href="{{ route('subkriteria.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
