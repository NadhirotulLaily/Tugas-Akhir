@extends('layouts.app')

@section('title','Rekap Kompen')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Rekap Kompen</h1>
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
                  @can('index-user')
                  <a href="{{ route('input.rekap') }}" class="btn btn-primary">Tambah</a> 
                  @endcan
                  <div class="float-right">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Kompen</th>
                        <th>Cetak Bebas Kompen</th>
                        @can('index-user')
                        <th>Action</th>
                        @endcan
                      </tr>
                      @forelse ($rekap as $index => $rekap )
                      <tr>
                        <td>
                          {{ $loop->index + 1 }}
                        </td>
                        <td>{{ $rekap->nama }}
                        </td>
                        <td>
                          {{ $rekap->nim }}
                        </td>
                        <td>
                          {{ $rekap->semester }}
                        </td>
                        <td>
                          {{ $rekap->kompen }}
                        </td>
                        <td>
                          @if ($rekap->kompen == 0)
                              <a href="{{ route('rekap.downloadPdf', $rekap->id) }}">Download Bebas Kompen PDF</a>
                          @endif
                      </td>
                        @can('index-user')
                        <td>
                          <a href="{{ route('rekap.edit', $rekap->id) }}"
                            class="btn btn-sm btn-info btn-icon "><i
                                class="fas fa-edit"></i>
                            Edit</a>

                            <a href="/input-rekap/delete/{{ $rekap->id }}"  class="btn btn-sm btn-danger btn-icon confirm-delete">
                              <i class="fas fa-times"></i> Delete </a>
                        </td>
                        @endcan
                      </tr>
                      @empty
                      <tr>
                        <td>
                            No Data Found
                        </td>
                      </tr>
                      @endforelse
                      
                    </table>
                  </div>
                  <div class="float-right">
                    <nav>
                      {{-- <ul class="pagination">
                        
                      </ul> --}}
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

<li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>
@endsection