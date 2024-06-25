@extends('layouts.app')

@section('title', 'Cek Tugas')

@section('content')

<section class="section">
    <div class="section-header">
        <a href="{{ route('tugas.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Cek Tugas</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Posts</h2>
        <p class="section-lead">
            You can manage all posts, such as editing, deleting and more.
        </p>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Posts</h4>
                </div>
                <div class="card-body">
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tugas</th>
                                    <th>Waktu</th>
                                    <th>Bukti Tugas</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tugas as $index => $tugasItem)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $tugasItem->tugas->tugas }}</td>
                                    <td>{{ $tugasItem->tugas->waktu }}</td>
                                    <td>
                                        <a href="{{ route('cektugas.lihatBukti', $tugasItem->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Lihat Bukti</a>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @if($tugasItem->status_verifikasi == 'Terverifikasi')
                                                <button class="btn btn-success" disabled><i class="fas fa-check"></i> Terverifikasi</button>
                                            @elseif($tugasItem->status_verifikasi == 'Tidak Terverifikasi')
                                                <button class="btn btn-danger" disabled><i class="fas fa-times"></i> Tidak Terverifikasi</button>
                                            @else
                                                <form action="{{ route('cektugas.update', $tugasItem->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="verifikasi" value="true">
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                                </form>
                                                <form action="{{ route('cektugas.update', $tugasItem->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Tidak ada tugas yang tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>                                                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('sidebar')
@parent

@endsection