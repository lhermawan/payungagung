@extends('navbar-tailwind.navbar')
@section('title', 'IDM Desa')
@section('content')

@php
    $bgColors = ['bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500'];
    $hoverColors = ['hover:bg-blue-600', 'hover:bg-green-600', 'hover:bg-yellow-600', 'hover:bg-purple-600'];
@endphp

<div class="flex flex-col gap-6 md:px-20 px-5 mt-32">

    {{-- Header --}}
    <div class="bg-white border border-gray-200 shadow-lg rounded-xl p-8">
        <h1 class="text-2xl md:text-4xl text-primary text-center font-dmsans">
            Laporan APDES <strong class="text-blue-500">PAYUNGAGUNG </strong>TAHUN {{ date('Y') }}
        </h1>

        {{-- Filter --}}
        @if ($categories->count())
            <div class="flex justify-center mt-4">
                <select id="categoryFilter" class="border rounded px-4 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="all">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ Str::slug($cat) }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>

    {{-- Sub-title
    <div class="bg-antiflash border border-gray-200 shadow-md rounded-xl p-6">
        <h2 class="text-xl md:text-3xl font-bold text-center text-yellow-500 font-dmsans">
            Laporan Anggaran Pendapatan Desa <strong class="text-blue-500">PAYUNGAGUNG</strong> TAHUN {{ date('Y') }}
        </h2>
    </div> --}}

    {{-- Grid Card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="cardContainer">
        @foreach ($data["datadesa"]["data"] as $index => $dt)
            @php
                $bg = $bgColors[$index % count($bgColors)];
                $hover = $hoverColors[$index % count($hoverColors)];
                $slugKategori = isset($dt['Kategori']) ? Str::slug($dt['Kategori']) : 'unknown';
            @endphp
            <div class="card-item rounded-xl shadow-md p-6 text-white text-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg {{ $bg }} {{ $hover }} category-{{ $slugKategori }}">
                <div class="text-4xl mb-3 animate-bounce" title="Anggaran">
                    <i class="far fa-money-bill-alt"></i>
                </div>
                <div class="text-lg font-semibold" title="Jumlah Anggaran">
                    Rp. {{ number_format($dt['Anggaran'], 0, ".", ".") }}
                </div>
                <p class="mt-1 text-sm" title="Obyek Anggaran">{{ $dt['Nama_Obyek'] }}</p>
            </div>
        @endforeach
    </div>

</div>

<script>
    // Basic filter by kategori
    document.getElementById('categoryFilter')?.addEventListener('change', function () {
        const value = this.value;
        document.querySelectorAll('.card-item').forEach(card => {
            if (value === 'all' || card.classList.contains('category-' + value)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

@endsection
