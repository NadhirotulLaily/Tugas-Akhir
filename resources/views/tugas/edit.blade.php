@extends('layouts.app')

@section('title','Edit Tugas')

@section('content')

<section class="section">
  <div class="section-header">
        <a href="{{ route('tugas.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Edit Tugas</h1>
    </div>

  <div class="section-body">
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="tugas">Tugas</label>
              <input type="text" name="tugas" id="tugas" class="form-control" placeholder="Masukkan Judul Tugas" value="{{ $tugas->tugas }}">
            </div>
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <select name="waktu" id="waktu" class="form-control">
                  <option value="1" {{ $tugas->waktu == '1' ? 'selected' : '' }}>1</option>
                  <option value="2" {{ $tugas->waktu == '2' ? 'selected' : '' }}>2</option>
                  <option value="3" {{ $tugas->waktu == '3' ? 'selected' : '' }}>3</option>
                  <option value="4" {{ $tugas->waktu == '4' ? 'selected' : '' }}>4</option>
                  <option value="5" {{ $tugas->waktu == '5' ? 'selected' : '' }}>5</option>
                  <option value="6" {{ $tugas->waktu == '6' ? 'selected' : '' }}>6</option>
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
