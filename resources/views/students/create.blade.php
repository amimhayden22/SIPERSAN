@extends('dashboard-layouts.app')
@section('title')
Tambah Santri
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('students.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Manajemen Santri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('students.index') }}">Manajemen Santri</a></div>
                <div class="breadcrumb-item">Tambah Santri</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Santri</h2>
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
                            <h4>Tambah Santri</h4>
                        </div>
                        {{-- formulir --}}
                        <form method="POST" action="{{ route('students.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
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

                                {{-- input nis --}}
                                <div class="form-group">
                                    <label for="nis">NIS <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" placeholder="Masukkan nis" value="{{ old('nis') }}" required>
                                    @if (count($errors) > 0)
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in NIS field
                                        </div>
                                    @endif
                                </div>
                                
                                {{-- input nama --}}
                                <div class="form-group">
                                    <label for="name">Nama Santri <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan nama santri" value="{{ old('name') }}" required>
                                    @if (count($errors) > 0)
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in Nama Santri field
                                        </div>
                                    @endif
                                </div>
                                
                                {{-- input tanggal lahir --}}
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" placeholder="Masukan nama santri" value="{{ old('date_of_birth') }}" required>
                                    @if (count($errors) > 0)
                                        @error('date_of_birth')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in Tanggal Lahir field
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Laki-laki" class="selectgroup-input" required @if (old('gender') == "Laki-laki") {{ 'checked' }} @endif>
                                        <span class="selectgroup-button">Laki-laki</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Perempuan" class="selectgroup-input" required @if (old('gender') == "Perempuan") {{ 'checked' }} @endif>
                                        <span class="selectgroup-button">Perempuan</span>
                                      </label>
                                    </div>
                                    @error('gender')
                                        <div class="invalid-feedback" style="display: block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Input Address --}}
                                <div class="form-group">
                                    <label for="address">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukkan alamat" value="{{ old('address') }}" required>
                                    @if (count($errors) > 0)
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in Alamat field
                                        </div>
                                    @endif
                                </div>

                                {{-- Input Wali --}}
                                <div class="form-group">
                                    <label for="wali">Wali <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('wali') is-invalid @enderror" name="wali" placeholder="Masukkan nama wali" value="{{ old('wali') }}" required>
                                    @if (count($errors) > 0)
                                        @error('wali')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in Wali field
                                        </div>
                                    @endif
                                </div>

                                {{-- Input Kamar --}}
                                <div class="form-group">
                                    <label for="room_id" class="form-label">Kamar <span class="text-danger">*</span></label><br>
                                    <select class="form-control  @error('room_id') is-invalid @enderror" aria-label="Default select example" name="room_id">
                                        <option selected>Pilih Kamar</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}" @if (old('room_id') == $room->id) {{ 'selected' }} @endif>{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                    @if (count($errors) > 0)
                                        @error('room_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please select in Kamar checkbox
                                        </div>
                                    @endif
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
