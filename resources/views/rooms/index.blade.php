@extends('dashboard-layouts.app')
@section('title')
Data Kamar
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/select.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kamar</h1>
            <div class="section-header-button">
                <a href="{{ route('rooms.create') }}" class="btn btn-primary">Tambah Kamar</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Manajemen Kamar</a></div>
                <div class="breadcrumb-item">Tabel Kamar</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Kamar</h2>
            <p class="section-lead">
                Kamu dapat mengelola data <strong>Kamar</strong> disini!
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
                            <h4>Kamar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kamar</th>
                                        <th>Asrama</th>
                                        <th>Ketua Kamar</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                    @forelse ($rooms as $room)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->dormitory->name }}</td>
                                        <td>{{ $room->user->name}}</td>
                                        <td>
                                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Data"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                            {{-- Hapus Data --}}
                                            <a href="{{ route('rooms.destroy', $room->id) }}" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-original-title="Hapus Data"
                                            data-confirm="Data akan dihapus?|Apakah anda yakin akan menghapus kamar bernama: <b>{{ $room->name }}</b>?"
                                            data-confirm-yes="event.preventDefault();
                                            document.getElementById('delete-portofolio-{{ $room->id }}').submit();"
                                            ><i class="fas fa-trash" aria-hidden="true"></i></a>
                                            <form id="delete-portofolio-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Room does not exist.</td>
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
