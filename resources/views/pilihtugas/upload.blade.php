@extends('layouts.app')

@section('title', 'Upload Bukti Tugas')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Upload Bukti Tugas</h1>
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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tugas</th>
                                    <th>Waktu</th>
                                    <th>Bukti Tugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($selectedTasks as $task)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $task->tugas->tugas }}</td>
                                        <td>{{ $task->tugas->waktu }}</td>
                                        <td>
                                            <input type="hidden" name="task_ids[]" value="{{ $task->id }}">
                                            <input type="file" name="bukti_tugas[]" class="form-control-file">
                                        </td>
                                    </tr>
                                    @php $counter++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
