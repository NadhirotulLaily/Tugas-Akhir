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
                  <div class="float-right"> 
                    <a href="{{ route('input.tugas') }}" class="btn btn-primary">Tambah</a> 
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                          <th>No</th>
                          <th>Tugas</th>
                          <th>Waktu</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      
                      @forelse ($tugas as $index => $tugasItem )
                      <tr>
                          <td>
                              {{ $loop->index + 1 }}
                          </td>
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
                            <a href="{{ route('tugas.edit', $tugasItem->id) }}" class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/input-tugas/delete/{{ $tugasItem->id }}" class="btn btn-sm btn-danger btn-icon confirm-delete"><i class="fas fa-times"></i> Delete</a>
                            
                            @if ($tugasItem->status == 'available')
                                <a href="{{ route('cektugas.index') }}" class="btn btn-sm btn-success btn-icon">Cek Tugas</a>
                            @endif
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="5">No Data Found</td>
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