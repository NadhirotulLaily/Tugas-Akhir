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
                        <h4>Total Mahasiswa Kompen</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalMahasiswaKompen }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tugas Available</h4>
                    </div>
                    <div class="card-body">
                        {{ $availableTugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-times-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tugas Unavailable</h4>
                    </div>
                    <div class="card-body">
                        {{ $unavailableTugas }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Diagram Mahasiswa Kompen</div>
                    <div class="card-body">
                        <canvas id="kompenChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Diagram Verifikasi Tugas</div>
                    <div class="card-body">
                        <canvas id="verifikasiChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Diagram Bar untuk Mahasiswa Kompen
    var ctxKompen = document.getElementById('kompenChart').getContext('2d');
    var kompenChart = new Chart(ctxKompen, {
        type: 'bar',
        data: {
            labels: ['Kompen Tuntas', 'Kompen Belum Tuntas'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [{{ $mahasiswaKompenZero }}, {{ $mahasiswaKompenNonZero }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Diagram Pie untuk Verifikasi Tugas
    var ctxVerifikasi = document.getElementById('verifikasiChart').getContext('2d');
    var verifikasiChart = new Chart(ctxVerifikasi, {
        type: 'pie',
        data: {
            labels: ['Tugas Terverifikasi', 'Tugas Belum Terverifikasi', 'Tugas Tidak Terverifikasi'],
            datasets: [{
                label: 'Jumlah Tugas',
                data: [{{ $verifiedTugas }}, {{ $unverifiedTugas }}, {{ $notVerifiedTugas }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
});
</script>

@endsection
