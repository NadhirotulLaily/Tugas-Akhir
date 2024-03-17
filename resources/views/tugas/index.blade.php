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
                    <a href="{{ route('tambah.tugas') }}" class="btn btn-primary">Tambah</a> 
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Tugas</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Verifikasi</th>
                        <th>Opsi</th>
                      </tr>
                                  
                      <tr>
                        <td>
                          1
                        </td>
                        <td>Install Aplikasi
                        </td>
                        <td>
                          <a href="#">4 Jam</a>
                        </td>
                        <td>
                          <div class="badge badge-warning">available</div>
                        </td>
                        <td>
                        </td>
                        <td>
                          <a href="#"
                            class="btn btn-sm btn-info btn-icon "><i
                                class="fas fa-edit"></i>
                            Edit</a>
                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                              <i class="fas fa-times"></i> Delete </button>
                      </tr>

                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Menerjemahkan Jurnal
                        </td>
                        <td>
                          <a href="#">8 Jam</a>
                        </td>
                        <td>
                          <div class="badge badge-warning">Unavailable</div>
                        </td>
                        <td>
                          <a href="{{ route('cektugas.index') }}"
                            class="btn btn-sm btn-info btn-icon ">
                            Cek Tugas</a>
                        </td>
                        <td>
                          <a href="#"
                            class="btn btn-sm btn-info btn-icon "><i
                                class="fas fa-edit"></i>
                            Edit</a>
                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                              <i class="fas fa-times"></i> Delete </button>
                      </tr>
                    </table>
                  </div>
                  <div class="float-right">
                    <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
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