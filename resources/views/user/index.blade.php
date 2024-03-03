@extends('layouts.app')

@section('title','User List')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Rekap Kompen</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
              Manage Your Users Here
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
                    <form method="GET">
                      <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
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
                        <th>Opsi</th>
                      </tr>
                      @forelse ($users as $index => $user )
                      <tr>
                        <td>
                            {{ $index + $users->firstItem() }}
                        </td>
                        <td>{{ $user->name }}
                          <div class="table-links">
                            <a href="#">View</a>
                            <div class="bullet"></div>
                            <a href="#">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" class="text-danger">Trash</a>
                          </div>
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->phone }}
                        </td>
                        <td>
                            @if ($user->email_verified_at != null)
                                <div class="badge badge-success">Active</div>
                                
                            @else
                                <div class="badge badge-warning">Pending</div>
                            @endif
                            
                        </td>
                        <td><div class="d-flex justify-content-end">
                          <a href="{{ route('user.edit', $user->id) }}"
                              class="btn btn-sm btn-info btn-icon "><i
                                  class="fas fa-edit"></i>
                              Edit</a>
                          <form action="{{ route('user.destroy', $user->id) }}"
                              method="POST" class="ml-2">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token"
                                  value="{{ csrf_token() }}">
                              <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                  <i class="fas fa-times"></i> Delete </button>
                          </form>
                      </div></td>
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
                      <ul class="pagination">
                       {{ $users->withQueryString()->links() }}
                      </ul>
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