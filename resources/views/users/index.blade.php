@extends('dashboard-layouts.app')
@section('title')
Pengguna Akun
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/select.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengguna Akun</h1>
            <div class="section-header-button">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna Akun</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna Akun</a></div>
                <div class="breadcrumb-item">Tabel Pengguna Akun</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Pengguna Akun</h2>
            <p class="section-lead">
                Kamu dapat mengelola data Pengguna Akun disini
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
                            <h4>Pengguna Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Data"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                            {{-- Hapus Data --}}
                                            <a href="#" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-original-title="Hapus Data"
                                            data-confirm="Data akan dihapus?|Apakah anda yakin akan menghapus user bernama: <b>{{ $user->name }}</b>?"
                                            data-confirm-yes="event.preventDefault();
                                            document.getElementById('delete-portofolio-{{ $user->id }}').submit();"
                                            ><i class="fas fa-trash" aria-hidden="true"></i></a>
                                            <form id="delete-portofolio-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Account users does not exist.</td>
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
