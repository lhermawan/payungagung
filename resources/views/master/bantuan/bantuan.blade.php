@extends('template.main')
@section('title', 'List Bantuan')
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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="text-right">
                                                <a href="/master/bantuan/create"
                                                    class="text-white bg-teal-600 rounded-lg px-3 py-2 hover:bg-teal-700 transition font-medium duration-300 ease-in-out">Tambah
                                                    Bantuan</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div style="overflow-x: auto">
                                                <table id="example2"
                                                    class="table table-striped table-bordered table-hover text-center"
                                                    style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Jenis</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bantuan as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->jenis }}</td>
                                                                <td class="text-nowrap">
                                                                    <form class="d-inline"
                                                                        action="/master/bantuan/{{ $data->id_bantuan }}/edit"
                                                                        method="GET">
                                                                        <button type="submit"
                                                                            class="btn btn-warning btn-sm mr-1"
                                                                            style="color: white;">
                                                                            <i class="fa-solid fa-pen"></i> Edit
                                                                        </button>
                                                                    </form>
                                                                    <form class="d-inline"
                                                                        action="/master/bantuan/{{ $data->id_bantuan }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            id="btn-delete">
                                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Jenis</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
