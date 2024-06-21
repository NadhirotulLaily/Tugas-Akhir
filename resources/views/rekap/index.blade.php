@extends('layouts.app')

@section('title', 'Rekap Kompen')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Rekap Kompen</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Posts</h2>
        <p class="section-lead">
            You can manage all posts, such as editing, deleting, and more.
        </p>
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
                    @endcan
                    @can('index-user')
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
                                @forelse ($rekap as $index => $rekap )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rekap->nama }}</td>
                                    <td>{{ $rekap->nim }}</td>
                                    <td>{{ $rekap->semester }}</td>
                                    <td>{{ $rekap->kompen }}</td>
                                    <td>
                                        @if ($rekap->kompen == 0)
                                        @cannot('index-admin')
                                        <a href="{{ route('rekap.downloadPdf', $rekap->id) }}" class="btn btn-sm btn-success">Download PDF</a>
                                        @endcannot
                                            
                                        @endif
                                    </td>
                                    @can('index-user')
                                      <td>
                                        @if ($rekap->kompen == 0)
                                        <div class="badge badge-success">Tuntas</div>
                                        @endif
                                        
                                      </td>
                                    @endcan
                                    @can('index-user')
                                    <td>
                                        <a href="{{ route('rekap.edit', $rekap->id) }}" class="btn btn-sm btn-info btn-icon">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="/input-rekap/delete/{{ $rekap->id }}" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                            <i class="fas fa-times"></i> Delete
                                        </a>
                                    </td>
                                    @endcan
                                </tr>
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
                            {{-- Pagination Links --}}
                        </nav>
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
