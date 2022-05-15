@extends('dashboard-layouts.app')
@section('title')
Tambah Pengguna Akun
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Pengguna Akun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna Akun</a></div>
                <div class="breadcrumb-item">Tambah Pengguna Akun</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Pengguna Akun</h2>
            <p class="section-lead">
                Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
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
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Pengguna</h4>
                        </div>
                        <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>Oops!</strong> Semua harus diisi, berikut kolom yang belum terisi:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Anda" value="{{ old('name') }}" required>
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

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email Anda" value="{{ old('email') }}" required>
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

                                <div class="form-group">
                                    <label for="password" class="d-block">Password <span class="text-danger">*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password anda" autocomplete="new-password" required>
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

                                <div class="form-group">
                                    <label class="form-label">Role <span class="text-danger">*</span></label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="role" value="Ketua Kamar" class="selectgroup-input" required @if (old('role') == "Ketua Kamar") {{ 'checked' }} @endif>
                                        <span class="selectgroup-button">Ketua Kamar</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="role" value="Pengurus Asrama" class="selectgroup-input" required @if (old('role') == "Pengurus Asrama") {{ 'checked' }} @endif>
                                        <span class="selectgroup-button">Pengurus Asrama</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="role" value="Pengurus Pondok" class="selectgroup-input" required @if (old('role') == "Pengurus Pondok") {{ 'checked' }} @endif>
                                        <span class="selectgroup-button">Pengurus Pondok</span>
                                      </label>
                                    </div>
                                    @error('role')
                                        <div class="invalid-feedback" style="display: block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button class="btn btn-primary">Buat</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
