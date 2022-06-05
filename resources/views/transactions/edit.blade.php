@extends('dashboard-layouts.app')
@section('title')
Edit Pengajuan Izin Santri
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/css/select2.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('transactions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Pengajuan Izin Santri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Data Izin Santri</a></div>
                <div class="breadcrumb-item">Edit Pengajuan Izin Santri</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Pengajuan Izin Santri</h2>
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
                            <h4>Edit Pengajuan Izin Santri</h4>
                        </div>
                        <form method="POST" action="{{ route('transactions.update', $editTransaction->id) }}" class="needs-" novalidate="">
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
                                @if(Auth::user()->role === 'Ketua Kamar')
                                    <input type="hidden" name="start_date" value="{{ $editTransaction->start_date }}">
                                    <input type="hidden" name="end_date" value="{{ $editTransaction->end_date }}">
                                    <input type="hidden" name="return_date" value="{{ $editTransaction->return_date }}">
                                    <input type="hidden" name="status" value="{{ $editTransaction->status }}">
                                @endif
                                <div class="form-group">
                                    <label for="student_id">Nama Santri <span class="text-danger">*</span></label>
                                    <select class="form-control select2 @error('student_id') is-invalid @enderror" name="student_id" id="student_id" required>
                                    <option value="" disabled selected>---- Pilih Nama Santri ----</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            @if ($editTransaction->student->id == $student->id)
                                                selected
                                                @if(Auth::user()->role === 'Pengurus Pondok')
                                                    disabled
                                                @endif
                                            @endif
                                        >{{ $student->name }}</option>
                                    @endforeach
                                    </select>
                                    @if (count($errors) > 0)
                                        @error('student_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please select your student name
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Alasan <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" rows="5" style="height:100%;" class="form-control @error('description') is-invalid @enderror" placeholder="Alasan santri izin..." @if(Auth::user()->role === 'Pengurus Pondok') readonly @endif>{{ $editTransaction->description }}</textarea>
                                    @if (count($errors) > 0)
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback">
                                            Please fill in your description
                                        </div>
                                    @endif
                                </div>

                                @if(Auth::user()->role === 'Pengurus Pondok')
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $editTransaction->status }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $editTransaction->start_date }}" required>
                                        @if (count($errors) > 0)
                                            @error('start_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your start date
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $editTransaction->end_date }}" required>
                                        @if (count($errors) > 0)
                                            @error('end_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your end date
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="return_date">Tanggal Pulang ke Pondok</label>
                                        <input type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{ $editTransaction->return_date }}">
                                        @if (count($errors) > 0)
                                            @error('return_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your start_date
                                            </div>
                                        @endif
                                    </div>
                                @endif

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
@section('script-libraies')
<script src="{{ asset('backend/assets/modules/select2/js/select2.full.min.js') }}"></script>
@endsection
