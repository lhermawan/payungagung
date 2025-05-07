@extends('template.main')
@section('title', 'Lapak Desa')
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
                                <div class="text-right">
                                    <a href="/admin/lapakdesa/create" class="btn btn-success">
                                        <i class="fa-solid fa-plus"></i> Tambah Produk
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div style="overflow-x: scroll" class="pb-3">
                                    <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Mitra</th>
                                                <th>Link WA</th>
                                                <th>Link Maps</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lapakdesas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nama_produk }}</td>
                                                    <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->deskripsi }}</td>
                                                    <td>{{ $data->mitra }}</td>
                                                    <td><a href="{{ $data->link_wa }}" target="_blank"
                                                            class="text-blue-500">Link</a></td>
                                                    <td><a href="{{ $data->link_maps }}" target="_blank"
                                                            class="text-blue-500">Link</a></td>
                                                    <td>
                                                        @if ($data->image)
                                                            <img src="{{ asset($data->image) }}" alt="Gambar"
                                                                style="width: 100px; height: auto;">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>

                                                    <td class="text-nowrap">
                                                        <form class="d-inline" action="/admin/lapakdesa/{{ $data->id }}"
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
