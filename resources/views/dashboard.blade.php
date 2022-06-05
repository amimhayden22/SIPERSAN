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
        @if (Auth::user()->role === 'Pengurus Pondok')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Asrama</h4>
                        </div>
                        <div class="card-body">
                            {{ $dormitories }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kamar</h4>
                        </div>
                        <div class="card-body">
                            {{ $rooms }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Santri</h4>
                        </div>
                        <div class="card-body">
                            {{ $students }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Akun</h4>
                        </div>
                        <div class="card-body">
                            {{ $users }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Santri Izin per Bulan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection
@if (Auth::user()->role === 'Pengurus Pondok')
@section('script-libraies')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('script')
<script>
    var monthNames = {!! $monthNames !!};
    var students = {!! $getStudents !!};

    window.onload = function(){
        var ctx = document.getElementById("myChart1").getContext('2d');
        lineChartWindow = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Jumlah Santri Izin',
                    data: students,
                    borderWidth: 2,
                    backgroundColor: '#3772ff',
                    borderColor: '#3772ff',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    }
</script>
@endsection
@endif
