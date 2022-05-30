@extends('dashboard-layouts.app')
@section('title')
Data Izin Santri
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables/select.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Izin Santri</h1>
            @if (Auth::user()->role === 'Ketua Kamar')
            <div class="section-header-button">
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">Mengajukan Izin Santri</a>
            </div>
            @endif
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Izin</a></div>
                <div class="breadcrumb-item">Tabel Izin</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Izin Santri</h2>
            <p class="section-lead">
                Kamu dapat mengurus perizinan santri disini
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
                            <h4>Data Izin Santri</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-users">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Santri</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Alasan Izin</th>
                                        <th>Batas Waktu Pulang Santri</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                    @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $transaction->student->name }}</td>
                                        <td>{{ $transaction->start_date }}</td>
                                        <td>{{ $transaction->end_date }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>{{ $transaction->due_date }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>
                                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Data"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                            {{-- Hapus Data --}}
                                            <a href="#" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-original-title="Hapus Data"
                                            data-confirm="Data akan dihapus?|Apakah anda yakin akan menghapus izin santri bernama: <b>{{ $transaction->student->name }}</b>?"
                                            data-confirm-yes="event.preventDefault();
                                            document.getElementById('delete-portofolio-{{ $transaction->id }}').submit();"
                                            ><i class="fas fa-trash" aria-hidden="true"></i></a>
                                            <form id="delete-portofolio-{{ $transaction->id }}" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Student permit list does not exist.</td>
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
