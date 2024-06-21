@extends('layouts.app')

@section('title','Tugas')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tugas</h1>
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
                    <a href="{{ route('input.tugas') }}" class="btn btn-primary">Tambah</a>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tugas</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tugas as $index => $tugasItem)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
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
                                        <a href="{{ route('tugas.edit', $tugasItem->id) }}"
                                            class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger btn-icon confirm-delete"
                                            data-toggle="modal" data-target="#deleteModal{{ $tugasItem->id }}"><i
                                                class="fas fa-times"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Data Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        <nav>
                            {{ $tugas->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($tugas as $tugasItem)
<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $tugasItem->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel{{ $tugasItem->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $tugasItem->id }}">Konfirmasi Hapus Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus tugas ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('tugas.delete', $tugasItem->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
                                          
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('sidebar')
@parent

@endsection
