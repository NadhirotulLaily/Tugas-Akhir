@extends('layouts.app')

@section('title','Input Rekap')

@section('content')

<section class="section">
  <div class="section-header">
        <a href="{{ route('rekap.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Input Rekap</h1>
    </div>

  <div class="section-body">
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan Nomor Induk Mahasiswa">
            </div>
            <div class="form-group">
              <label for="kompen">Kompen</label>
              <input type="text" name="komopen" id="kompen" class="form-control">
              </select>
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <select name="semester" id="semester" class="form-control">
                <option value="satu">1</option>
                <option value="dua">2</option>
                <option value="satu">3</option>
                <option value="dua">4</option>
                <option value="satu">5</option>
                <option value="dua">6</option>
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

<li class="menu-header">Starter</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
  </ul>
</li>
@endsection
