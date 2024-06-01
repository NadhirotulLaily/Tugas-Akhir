@extends('layouts.app')

@section('title', 'Pilih Tugas')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Pilih Tugas</h1>
    </div>

    <div class="section-body">
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Semua Tugas</h4>
                </div>
                <div class="card-body">
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <form method="POST" action="{{ route('pilihtugas.process') }}" onsubmit="return confirm('Apakah Anda yakin ingin memilih tugas ini?')">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tugas</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tugas as $index => $tugasItem)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $tugasItem->tugas }}</td>
                                            <td>{{ $tugasItem->waktu }}</td>
                                            <td>{{ $tugasItem->status }}</td>
                                            <td>
                                                <input type="checkbox" name="selected_tasks[]" value="{{ $tugasItem->id }}" {{ $tugasItem->status == 'unavailable' ? 'disabled' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary float-right">Pilih</button>
                        </form>
                    </div>
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
