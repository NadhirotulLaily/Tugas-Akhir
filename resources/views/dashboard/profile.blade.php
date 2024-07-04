@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Edit Password</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, {{ auth()->user()->name }} !</h2>
            <p class="section-lead">
                Change password on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card">
                        <form method="POST" action="{{ route('user-password.update') }}" class="needs-validation"
                            novalidate="">
                            @csrf
                            @method('PUT')

                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password','updatePassword')
                    is-invalid
                  @enderror"
                                            name="current_password" tabindex="2">
                                        @error('current_password','updatePassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="password">New Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password','updatePassword')
                    is-invalid
                  @enderror"
                                            name="password" tabindex="2">
                                        @error('password','updatePassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation')
                    is-invalid
                  @enderror"
                                            name="password_confirmation" tabindex="2">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Changes Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@endpush
