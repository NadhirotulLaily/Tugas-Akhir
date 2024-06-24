@extends('layouts.app')

@section('title', 'Lihat Bukti Tugas')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('cektugas.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Lihat Bukti Tugas</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{ $tugasItem->tugas->tugas }}</h2>
        <p class="section-lead">
            Bukti tugas untuk {{ $tugasItem->tugas->tugas }}.
        </p>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    @if($tugasItem->bukti_tugas)
                        <img src="{{ Storage::url('public/bukti_tugas/' . $tugasItem->bukti_tugas) }}" alt="{{ $tugasItem->tugas->tugas }}" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/default.png') }}" alt="{{ $tugasItem->tugas->tugas }}" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
