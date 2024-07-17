@extends('layouts.app')

@section('title','Create Tugas')

@section('content')

<section class="section">
  <div class="section-header">
        <a href="{{ route('tugas.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Input Tugas</h1>
    </div>

  <div class="section-body">
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="tugas">Tugas</label>
              <input type="text" name="tugas" id="tugas" class="form-control" placeholder="Masukkan Judul Tugas">
            </div>
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <select name="waktu" id="waktu" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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