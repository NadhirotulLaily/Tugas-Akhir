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
                        <th >
                          No
                        </th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>NIM</th>
                        <th>Kompen</th>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>Laravel 5 Tutorial: Introduction
                          <div class="table-links">
                            <a href="#">View</a>
                            <div class="bullet"></div>
                            <a href="#">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" class="text-danger">Trash</a>
                          </div>
                        </td>
                        <td>
                          <a href="#">Web Developer</a>,
                          <a href="#">Tutorial</a>
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                          </a>
                        </td>
                        <td>2018-01-20</td>
                        <td><div class="badge badge-primary">Published</div></td>
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