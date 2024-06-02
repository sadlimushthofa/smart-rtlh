@extends('layouts.app')

@section('title', 'Form Tambah Data Bobot')

@section('content')
<form action="{{ isset($bobot) ? route('bobot.tambah.update', $bobot->id) : route('bobot.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($bobot) ? 'Form Edit Data Bobot' : 'Form Tambah Data Bobot' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_kriteria">Kriteria</label>
                <select name="id_kriteria" id="id_kriteria" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Kriteria --</option>
                  @foreach ($kriteria as $row)
                    <option value="{{ $row->id }}" {{ isset($bobot) ? ($bobot->id_kriteria == $row->id ? 'selected' : '') : '' }}>{{ $row->nama }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="nilai_bobot">Nilai Bobot</label>
              <input type="number" class="form-control" id="nilai_bobot" name="nilai_bobot" value="{{ isset($bobot) ? $bobot->nilai_bobot : '' }}">
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>    
@endsection