@extends('layouts.app')

@section('title','Upload Bukti Tugas')

@section('content')

<section class="section">
          <div class="section-header">
            <a href="{{ route('pilihtugas.index') }}" style="margin-right: 10px;">
              <i class="fas fa-chevron-left" style="font-size: 1.5em; vertical-align: middle;"></i>
          </a>
            <h1>Upload Tugas</h1>
          </div>

          <div class="section-body">
          </div>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Posts</h4>
                  
                </div>
                <div class="card-body">


                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                          <th>No</th>
                          <th>Tugas</th>
                          <th>Waktu</th>
                          <th>Bukti Tugas</th>
                          <th></th>
                      </tr>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tugas 1</td>
                            <td>5</td>
                            <td>
                              <input type="file" name="bukti_tugas_1">
                          </td>
                          <td>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tugas 2</td>
                            <td>2</td>
                            <td>
                              <input type="file" name="bukti_tugas_2">
                          </td>
                          <td>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tugas 3</td>
                            <td>6</td>
                            <td>
                              <input type="file" name="bukti_tugas_3">
                          </td>
                          <td>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </td>
                        </tr>
                      </tbody>
                      
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