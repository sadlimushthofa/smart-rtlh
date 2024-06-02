@extends('layouts.app')

@section('title', 'Form Tambah Data Sub Kriteria')

@section('content')
<form action="{{ isset($subkriteria) ? route('subkriteria.tambah.update', $subkriteria->id) : route('subkriteria.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($subkriteria) ? 'Form Edit Data Sub Kriteria' : 'Form Tambah Data Sub Kriteria' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_kriteria">Kriteria</label>
                <select name="id_kriteria" id="id_kriteria" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Kriteria --</option>
                  @foreach ($kriteria as $row)
                    <option value="{{ $row->id }}" {{ isset($subkriteria) ? ($subkriteria->id_kriteria == $row->id ? 'selected' : '') : '' }}>{{ $row->nama }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="nama">Nama Sub Kriteria</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($subkriteria) ? $subkriteria->nama : '' }}">
            </div>
            <div class="form-group">
                <label for="nilai">Nilai Preferensi</label>
                <input type="number" class="form-control" id="nilai" name="nilai" value="{{ isset($subkriteria) ? $subkriteria->nilai : '' }}">
              </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
