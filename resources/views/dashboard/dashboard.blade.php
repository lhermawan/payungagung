@extends('template.main')
@section('title', 'Dashboard')
@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $penduduk }}</h3>
                                <p class="font-weight-bold">Penduduk</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-large "></i>
                            </div>
                            <a href="/penduduk" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>{{ $disabilitas }}</h3>
                                <p class="font-weight-bold">Disabilitas</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-hospital-user"></i>
                            </div>
                            <a href="/disabilitas" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $pekerjaanCount }}</h3>
                                <p class="font-weight-bold">Pekerjaan</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <a href="/pekerjaan" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-gray">
                            <div class="inner">
                                <h3>{{ $jumlahKeluarga }}</h3>
                                <p class="font-weight-bold">Keluarga</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-people-roof"></i>
                            </div>
                            <a href="/pekerjaan" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
