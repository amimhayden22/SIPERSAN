@extends('dashboard-layouts.app')
@section('title')
Data Santri
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/select.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Santri</h1>
            <div class="section-header-button">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Santri</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('students.index') }}">Manajemen Santri</a></div>
                <div class="breadcrumb-item">Tabel Santri</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Santri</h2>
            <p class="section-lead">
                Kamu dapat mengelola data <strong>Santri</strong> disini!
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

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4>Santri</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-users">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Wali</th>
                                        <th>Alamat</th>
                                        <th>Kamar</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                    @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $student->nis }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->date_of_birth}}</td>
                                        <td>{{ $student->gender}}</td>
                                        <td>{{ $student->wali}}</td>
                                        <td>{{ $student->address}}</td>
                                        <td>{{ $student->room->name}}</td>
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Data"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                            {{-- Hapus Data --}}
                                            <a href="{{ route('students.destroy', $student->id) }}" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-original-title="Hapus Data"
                                            data-confirm="Data akan dihapus?|Apakah anda yakin akan menghapus kamar bernama: <b>{{ $student->name }}</b>?"
                                            data-confirm-yes="event.preventDefault();
                                            document.getElementById('delete-portofolio-{{ $student->id }}').submit();"
                                            ><i class="fas fa-trash" aria-hidden="true"></i></a>
                                            <form id="delete-portofolio-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center"> Student does not exist.</td>
                                    </tr>
                                    @endforelse
                                  </tbody>
                                </table>
                            </div>
                        </div>
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
