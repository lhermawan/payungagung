@extends('template.main')
@section('title')
    Penduduk {{ auth()->user()->level === 'Admin' ? '' : auth()->user()->level }}
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

                                <div class="flex justify-between items-center">
                                    <div>

                                        <form action="/penduduk" method="GET" class="flex items-center max-w-sm mx-auto">
                                            <label for="simple-search" class="sr-only">Search</label>
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 mr-2" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12 14c4.418 0 8 3.582 8 8H4c0-4.418 3.582-8 8-8zM12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10z" />
                                                    </svg>
                                                </div>
                                                <input name="search" type="text" id="simple-search"
                                                    value="{{ request('search') }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0d9488] focus:border-[#0d9488] block w-full ps-10 p-2.5"
                                                    placeholder="Cari Penduduk..." />
                                            </div>
                                            <button type="submit"
                                                class="p-2.5 ms-2 text-sm font-medium text-white bg-[#0d9488] rounded-lg border border-[#0d9488] hover:bg-primaryhover focus:ring-4 focus:outline-none focus:ring-teal-300">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                                <span class="sr-only">Search</span>
                                            </button>
                                        </form>


                                    </div>
                                    <div class="py-1">
                                        <a href="/penduduk/create"
                                            class="text-white bg-teal-600 rounded-lg px-3 py-2 hover:bg-teal-700 transition font-medium duration-300 ease-in-out">Tambah
                                            <span class="hidden md:inline">Penduduk</span></a>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto">
                                    <table id="example3" class="table table-striped table-bordered table-hover text-center"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>KK</th>
                                                <th>Nama</th>
                                                <th>RT</th>
                                                <th>RW</th>
                                                <th>Dusun</th>
                                                <th>Pendidikan</th>
                                                <th>Pekerjaan</th>
                                                <th>Agama</th>
                                                <th>Perkawinan</th>
                                                <th>Gol. Darah</th>
                                                <th>SHDK</th>
                                                <th>Bantuan Sosial</th>
                                                <th>JKN-KIS</th>
                                                <th>Ayah</th>
                                                <th>Ibu</th>
                                                <th>Kep. Keluarga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penduduk as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nik }}</td>
                                                    <td>{{ $data->no_kk }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->rt }}</td>
                                                    <td>{{ $data->rw }}</td>
                                                    <td>{{ $data->dusun }}</td>
                                                    <td>{{ $data->pendidikan }}</td>
                                                    <td>{{ $data->pekerjaan }}</td>
                                                    <td>{{ $data->agama }}</td>
                                                    <td>{{ $data->status_perkawinan }}</td>
                                                    <td>{{ $data->golongan_darah }}</td>
                                                    <td>{{ $data->shdk }}</td>
                                                    <td>{{ $data->bantuan }}</td>
                                                    <td>{{ $data->kis }}</td>
                                                    <td>{{ $data->ayah }}</td>
                                                    <td>{{ $data->ibu }}</td>
                                                    <td>{{ $data->kepala_keluarga }}</td>
                                                    <td class="text-nowrap">
                                                        <form class="d-inline" action="/penduduk/{{ $data->nik }}/edit"
                                                            method="GET">
                                                            <button type="submit" class="btn btn-warning btn-sm mr-1"
                                                                style="color: white;">
                                                                <i class="fa-solid fa-pen"></i> Edit
                                                            </button>
                                                        </form>
                                                        <form class="d-inline" action="/penduduk/{{ $data->nik }}"
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
                                    <div class="mt-3 mb-3 flex md:justify-end justify-center">
                                        {{ $penduduk->links('pagination::bootstrap-4') }}
                                    </div>
                                    <!-- Pagination Links -->

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
