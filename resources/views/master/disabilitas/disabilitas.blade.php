@extends('template.main')
@section('title')
    List Warga Disabilitas {{ auth()->user()->level === 'Admin' ? '' : auth()->user()->level }}
@endsection
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right py-1">
                                    <a href="/mdisabilitas/create"
                                        class="text-white bg-teal-600 rounded-lg px-3 py-2 hover:bg-teal-700 transition font-medium duration-300 ease-in-out">Tambah
                                        <span class="hidden md:inline">Warga Disabilitas</span></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto">
                                    <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                @if (auth()->user()->level == 'Admin')
                                                    <th>Dusun</th>
                                                @endif
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($disabilitas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nik }}</td>
                                                    <td>{{ $data->penduduk_nama }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    @if (auth()->user()->level == 'Admin')
                                                        <td>{{ $data->dusun }}</td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info">Action</button>
                                                            <button type="button"
                                                                class="btn btn-info dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                                <a class="dropdown-item"
                                                                    href="/mdisabilitas/{{ $data->id_disabilitas }}/edit">Edit
                                                                </a>
                                                                <form action="/mdisabilitas/{{ $data->id_disabilitas }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="dropdown-item text-danger"
                                                                        id="btn-delete">Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                @if (auth()->user()->level == 'Admin')
                                                    <th>Dusun</th>
                                                @endif
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
    </div>
@endsection
