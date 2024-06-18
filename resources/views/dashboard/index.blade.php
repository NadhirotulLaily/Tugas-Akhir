@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kompen</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalKompen }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Tugas yang Dipilih</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalTugas }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
    </div>
</section>
@endsection
