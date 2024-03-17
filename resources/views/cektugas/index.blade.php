@extends('layouts.app')

@section('title','Cek Tugas')

@section('content')

<section class="section">
    <div class="section-header">
        <a href="{{ route('tugas.index') }}" style="margin-right: 10px;">
            <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
        </a>
        <h1 style="display: inline-block; vertical-align: middle;">Cek Tugas</h1>
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
                    
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Tugas</th>
                        <th>Waktu</th>
                        <th>Bukti</th>
                        <th>Verifikasi</th>
                        <th>Status</th>
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
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gambarModal">Lihat Gambar</button>
                        </td>
                        <td>
                          <button class="btn btn-success" disabled><i class="fas fa-check"></i></button>
                          <button class="btn btn-danger" disabled><i class="fas fa-times"></i></button>
                      </td>
                      
                        <td>
                          <div class="badge badge-warning">Pending</div>
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