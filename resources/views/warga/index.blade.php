@extends('layouts.app')

@section('title', 'Data Warga')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Warga</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('warga.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa fa-plus"></i> Tambah Data Warga</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($warga as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>
                                <a href="{{ route('warga.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa fa-edit"></i> Edit</a>
                                <a href="{{ route('warga.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
