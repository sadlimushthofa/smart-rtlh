@extends('layouts.app')

@section('title', 'Form Tambah Data Warga')

@section('content')
<form action="{{ isset($warga) ? route('warga.tambah.update', $warga->id) : route('warga.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($warga) ? 'Form Edit Data Warga' : 'Form Tambah Data Warga' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Warga</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($warga) ? $warga->nama : '' }}">
            </div>
            <div class="form-group">
                <label for="nama">Alamat Warga</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($warga) ? $warga->alamat : '' }}">
              </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
