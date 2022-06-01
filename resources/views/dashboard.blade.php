@extends('dashboard-layouts.app')
@section('title')
Dashboard
@endsection
@section('main-content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="hero bg-danger text-white" style="background-color: #47c363 !important;">
          <div class="hero-inner">
            <h2>Sistem Informasi Perizinan Santri</h2>
            <p class="lead">
              Selamat Datang, <strong>{{ Auth::user()->name }}</strong>. Anda login sebagai <u>{{ Auth::user()->role }}</u>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
