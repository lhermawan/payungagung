@extends('sctemplate.scmain')
@section('title', 'Agama')
@section('content')

    <section class="content mt-28 md:px-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Agama</th>
                                        <th colspan="2">Jumlah</th>
                                        <th class="hidden md:table-cell" colspan="2">Laki-laki</th>
                                        <th class="hidden md:table-cell" colspan="2">Perempuan</th>
                                    </tr>
                                    <tr>
                                        <th>n</th>
                                        <th>%</th>
                                        <th>n</th>
                                        <th>%</th>
                                        <th>n</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agamaData as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data['agama'] }}</td>
                                            <td>{{ $data['jumlah_n'] }}</td>
                                            <td>{{ $data['jumlah_percent'] }}%</td>
                                            <td>{{ $data['laki_laki_n'] }}</td>
                                            <td>{{ $data['laki_laki_percent'] }}%</td>
                                            <td>{{ $data['perempuan_n'] }}</td>
                                            <td>{{ $data['perempuan_percent'] }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>{{ $total_jumlah_n }}</th>
                                        <th>{{ $total_jumlah_percent }}</th>
                                        <th>{{ $total_laki_laki_n }}</th>
                                        <th>{{ $total_laki_laki_percent }}</th>
                                        <th>{{ $total_perempuan_n }}</th>
                                        <th>{{ $total_perempuan_percent }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
