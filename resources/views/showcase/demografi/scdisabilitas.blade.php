@extends('sctemplate.scmain')
@section('title', 'Disabilitas')
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
                                        <th>No</th>
                                        <th>Nama Dusun</th>
                                        <th>Fisik</th>
                                        <th>Ganda</th>
                                        <th>Mental</th>
                                        <th>Sensorik</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['dusun'] }}</td>
                                            <td>{{ $item['fisik'] }}</td>
                                            <td>{{ $item['ganda'] }}</td>
                                            <td>{{ $item['mental'] }}</td>
                                            <td>{{ $item['sensorik'] }}</td>
                                            <td>{{ $item['total'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th>{{ array_sum(array_column($data, 'fisik')) }}</th>
                                        <th>{{ array_sum(array_column($data, 'ganda')) }}</th>
                                        <th>{{ array_sum(array_column($data, 'mental')) }}</th>
                                        <th>{{ array_sum(array_column($data, 'sensorik')) }}</th>
                                        <th>{{ array_sum(array_column($data, 'total')) }}</th>
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
