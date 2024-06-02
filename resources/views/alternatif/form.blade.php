@extends('layouts.app')

@section('title', 'Form Tambah Data Alternatif')

@section('content')
<form action="{{ isset($alternatif) ? route('alternatif.tambah.update', $alternatif->id) : route('alternatif.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($alternatif) ? 'Form Edit Data Alternatif' : 'Form Tambah Data Alternatif' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($alternatif) ? $alternatif->nama : '' }}">
            </div>
            @foreach ($kriteria as $key)
                @php
                $sub_kriteria =
                App\Models\Alternatif::sub_kriteria($key->id);
                @endphp
                <input type="text" name="id_kriteria[]" value="{{ $key->id }}" hidden>
                <div class="form-group">
                    <label class="font-weight-bold" for="{{ $key->id }}">{{
                        $key->nama }}</label>
                    <select name="nilai[]" class="form-control" id="{{ $key->id }}"
                        required>
                        <option value="">--Pilih--</option>
                        @foreach ($sub_kriteria as $subskriteria)
                        <option value="{{ $subskriteria->id }}">{{
                            $subskriteria->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
