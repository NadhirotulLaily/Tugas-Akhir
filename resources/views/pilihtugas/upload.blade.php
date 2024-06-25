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
                                    <th>Status Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $counter = 1; 
                                    $uploadedFiles = session('uploadedFiles', []);
                                    $allFilesUploaded = session('allFilesUploaded', false);
                                @endphp
                                @foreach($selectedTasks as $task)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $task->tugas->tugas }}</td>
                                        <td>{{ $task->tugas->waktu }}</td>
                                        <td>
                                            @if(isset($uploadedFiles[$task->id]))
                                                <span>{{ $uploadedFiles[$task->id] }}</span>
                                            @elseif($task->status_verifikasi == 'Terverifikasi' || $task->status_verifikasi == 'Tidak Terverifikasi')
                                                <span>{{ $task->bukti_tugas }}</span>
                                            @else
                                                <input type="hidden" name="task_ids[]" value="{{ $task->id }}">
                                                <input type="file" name="bukti_tugas[]" class="form-control-file" required>
                                            @endif
                                        </td>
                                        <td>
                                            @if($task->status_verifikasi == 'Terverifikasi')
                                                <span class="badge badge-success">{{ $task->status_verifikasi }}</span>
                                            @elseif($task->status_verifikasi == 'Tidak Terverifikasi')
                                                <span class="badge badge-danger">{{ $task->status_verifikasi }}</span>
                                            @else
                                                <span class="badge badge-warning">{{ $task->status_verifikasi }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $counter++; @endphp
                                @endforeach
                            </tbody>                            
                        </table>
                        <div class="card-footer text-right">
                            @if(!$allFilesUploaded)
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-upload"></i> Kirim
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
