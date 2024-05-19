@extends('layouts.app')

@section('title', 'Tugas Dipilih')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tugas Dipilih</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tugas yang Dipilih</h4>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('cektugas.store') }}">
                @csrf
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tugas</th>
                                <th>Waktu</th>
                                <th>Bukti Tugas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($selectedTasks as $task)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $task->tugas }}</td>
                                    <td>{{ $task->waktu }}</td>
                                    <td>
                                            <input type="file" name="bukti_tugas">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                </td>
                                </tr>
                                @php $counter++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>

@endsection
