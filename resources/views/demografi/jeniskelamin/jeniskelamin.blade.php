@extends('template.main')
@section('title', 'Jenis Kelamin')
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
                < </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">

                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Jumlah (n)</th>
                                                <th>Persentase (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jenisKelaminData as $index => $data)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $data['jenis_kelamin'] }}</td>
                                                    <td>{{ $data['jumlah_n'] }}</td>
                                                    <td>{{ $data['jumlah_percent'] }}%</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th></th>
                                                <th>{{ $total_jumlah_n }}</th>
                                                <th>{{ $total_jumlah_percent }}%</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    @endsection
