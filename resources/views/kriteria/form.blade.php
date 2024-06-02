@extends('layouts.app')

@section('title', 'Form Tambah Data Kriteria')

@section('content')
<form action="{{ isset($kriteria) ? route('kriteria.tambah.update', $kriteria->id) : route('kriteria.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($kriteria) ? 'Form Edit Data Kriteria' : 'Form Tambah Data Kriteria' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Kriteria</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($kriteria) ? $kriteria->nama : '' }}">
            </div>
            <div class="form-group">
                <label for="bobot">Bobot Kriteria</label>
                <input type="number" class="form-control" id="bobot" name="bobot" value="{{ isset($kriteria) ? $kriteria->bobot : '' }}">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Kriteria</label>
                <select name="jenis" class="form-control" required>
                    <option value="">--Pilih Jenis Kriteria--</option>
                    <option value="Benefit" {{ old('jenis')=='Benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="Cost" {{ old('jenis')=='Cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
