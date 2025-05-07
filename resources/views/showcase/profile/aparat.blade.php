@extends('navbar-tailwind.navbar')
@section('title', 'Aparatur Desa')
@section('content')

<div class="flex flex-col gap-3 md:px-20">
    <div class="text-center">
        <h1 class="mt-32 text-2xl md:text-4xl text-primary font-dmsans mx-10 md:mx-0">
            Aparatur <span class="text-blue-600">Desa</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-20 mt-6">
        @foreach ($data["pegawaidesa"]["data"] as $pegawai)
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <img
    src="{{ $link }}/data/foto/pegawai/{{ $pegawai['foto_pegawai'] }}"
    alt="{{ $pegawai['nama_lengkap'] }}"
    class="w-full h-64 object-contain object-top"
/>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $pegawai['nama_lengkap'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $pegawai['jabatan'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
