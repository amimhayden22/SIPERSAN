@extends('dashboard-layouts.app')
@section('title')
Edit Pengguna Akun
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('rooms.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Manajemen Kamar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Manajemen Kamar</a></div>
                <div class="breadcrumb-item">Edit Kamar</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kamar</h2>
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
                            <h4>Edit Kamar</h4>
                        </div>
                        <form method="POST" action="{{ route('rooms.update', $editRoom->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Anda" value="{{ $editRoom->name }}" required>
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
                                    <label for="id_user" class="form-label">Asrama <span class="text-danger">*</span></label><br>
                                    <select class="form-select" aria-label="Default select example" name="dormitory_id">
                                        <option selected>Pilih Asrama</option>
                                        @foreach ($dormitories as $dormitory)
                                            <option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_user" class="form-label">Ketua <span class="text-danger">*</span></label><br>
                                    <select class="form-select" aria-label="Default select example" name="user_id">
                                        <option selected>Pilih Ketua Kamar</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-right">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button class="btn btn-primary">Edit</button>
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
