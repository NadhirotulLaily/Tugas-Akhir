@extends('layouts.app')

@section('title','Edit Data Rekap')

@section('content')

<section class="section">
  <div class="section-header">
        <a href="{{ route('rekap.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Edit Data Rekap</h1>
    </div>

  <div class="section-body">
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('rekap.update', ['id' => $rekap->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa" value="{{ $rekap->nama }}">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan Nomor Induk Mahasiswa" value="{{ $rekap->nim }}">
            </div>
            <div class="form-group">
              <label for="kompen">Kompen</label>
              <input type="text" name="kompen" id="kompen" class="form-control" value="{{ $rekap->kompen }}">
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <select name="semester" id="semester" class="form-control">
                <option value="1" {{ $rekap->semester == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $rekap->semester == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $rekap->semester == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $rekap->semester == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $rekap->semester == '5' ? 'selected' : '' }}>5</option>
                <option value="6" {{ $rekap->semester == '6' ? 'selected' : '' }}>6</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('sidebar')
@parent


@endsection
