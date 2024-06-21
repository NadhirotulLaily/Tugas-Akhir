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
                        <form id="tugasForm" method="POST" action="{{ route('pilihtugas.process') }}">
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
                                            <td>
                                                @if ($tugasItem->status == 'available')
                                                    <span class="badge badge-success" style="color: white">{{ $tugasItem->status }}</span>
                                                @else
                                                    <span class="badge badge-danger" style="color: white">{{ $tugasItem->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="selected_tasks[]" value="{{ $tugasItem->id }}" {{ $tugasItem->status == 'unavailable' ? 'disabled' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#confirmModal">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pemilihan Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin memilih tugas ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('tugasForm').submit();">Ya, Pilih</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
@parent

@endsection
