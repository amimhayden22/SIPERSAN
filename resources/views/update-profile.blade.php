@extends('backend.layouts.app')
@section('title')
Profil
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/select.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profil</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Profil</h2>
            <p class="section-lead">
                Anda dapat memperbarui profil di sini.
            </p>

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Success!</strong> {{ Session('success') }}.
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="{{ route('users.update-profile', $showUser->id) }}" method="post" class="-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $showUser->name }}" required="">
                                        @if (count($errors) > 0)
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your name
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $showUser->email }}" required="">
                                        @if (count($errors) > 0)
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your email
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password" class="d-block">Kata Sandi Baru</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        @if (count($errors) > 0)
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your password
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="password-confirm" class="d-block">Konfirmasi Kata Sandi Baru</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Perbarui profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script-libraies')
<script src="{{ asset('backend/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/datatables/select.bootstrap4.min.js') }}"></script>
@endsection
@section('script-page-specific')
<script src="{{ asset('backend/assets/js/page/modules-datatables.js') }}"></script>
@endsection
