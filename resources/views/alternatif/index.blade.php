@extends('layouts.app')

@section('title', 'Data Alternatif')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('alternatif.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa fa-plus"></i> Tambah Data Alternatif</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @foreach ($kriteria as $key)
                            <th>{{ $key->nama }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($alternatif as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nama }}</td>
                            @foreach ($alternatif as $key)
                            <td>
                                {{ $key->nilai }}
                            </td>
                            @endforeach
                            <td>
                                <a href="{{ route('alternatif.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa fa-edit"></i> Edit</a>
                                <a href="{{ route('alternatif.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
