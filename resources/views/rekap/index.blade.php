@extends('layouts.app')

@section('title', 'Rekap Kompen')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kompen</h1>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Posts</h4>
                </div>
                <div class="card-body">
                    @can('index-user')
                    <a href="{{ route('input.rekap') }}" class="btn btn-primary">Tambah</a>
                    <div class="float-right mb-3">
                        <form action="{{ route('rekap.search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Semester</th>
                                    <th>Kompen</th>
                                    <th>@cannot('index-admin')
                                        Form Bebas Kompen
                                        @endcannot </th>
                                    <th>
                                        @can('index-user')
                                        Status
                                        @endcan
                                    </th>
                                    @can('index-user')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekap as $index => $item)
                                <tr>
                                    <td>{{ $rekap->firstItem() + $index }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->semester }}</td>
                                    <td>{{ $item->kompen }}</td>
                                    <td>
                                        @if ($item->kompen == 0)
                                        @cannot('index-admin')
                                        <a href="{{ route('rekap.downloadPdf', $item->id) }}"
                                            class="btn btn-sm btn-success">Download PDF</a>
                                        @endcannot
                                        @endif
                                    </td>
                                    @can('index-user')
                                    <td>
                                        @if ($item->kompen == 0)
                                        <div class="badge badge-success">Tuntas</div>
                                        @endif
                                    </td>
                                    @endcan
                                    @can('index-user')
                                    <td>
                                        <a href="{{ route('rekap.edit', $item->id) }}"
                                            class="btn btn-sm btn-info btn-icon">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger btn-icon delete-btn"
                                            data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                            <i class="fas fa-times"></i> Delete
                                        </a>
                                    </td>
                                    @endcan
                                </tr>
                                <!-- Modal -->
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            {{ $rekap->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach ($rekap as $item)
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('rekap.destroy', $item->id) }}" method="POST">
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
