@extends('navbar-tailwind.navbar')
@section('title', 'IDM Desa')
@section('content')

<div class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-6">

        <h1 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0 text-center">IDM Desa <strong class="text-blue-500">PAYUNGAGUNG</strong></h1>
        <hr class="border-t border-gray-300 my-4" />

        <!-- Header Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <!-- Select Tahun -->
            <form action="/idm/{{$year}}" method="GET" class="flex items-center gap-3">
                <select name="ptahun" id="ptahun" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">Pilih Tahun</option>
                    @foreach($tahun as $thn)
                        <option value="{{ $thn }}" {{ $year == $thn ? 'selected' : '' }}>{{ $thn }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Cari</button>
            </form>

            <!-- Identitas Desa -->
            <div class="bg-gray-50 border border-gray-200 p-4 rounded">
                @foreach ($identitas as $data)
                <table class="w-full text-sm text-left text-gray-600">
                    <tr><th class="font-medium w-1/3">Provinsi</th><td>{{ $data->nama_provinsi }}</td></tr>
                    <tr><th class="font-medium">Kabupaten</th><td>{{ $data->nama_kab_kota }}</td></tr>
                    <tr><th class="font-medium">Kecamatan</th><td>{{ $data->nama_kecamatan }}</td></tr>
                    <tr><th class="font-medium">Desa</th><td>{{ $data->nama_desa }}</td></tr>
                </table>
                @endforeach
            </div>
        </div>

        <!-- Statistik IDM -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-blue-100 border border-blue-300 p-4 rounded shadow">
                <i class="fas fa-book text-xl text-blue-700"></i>
                <h4 class="text-lg font-semibold mt-2">SKOR <strong>IDM SAAT INI</strong></h4>
                <p class="text-xl mt-1">{{ number_format($summaries->SKOR_SAAT_INI, 4) }}</p>
            </div>
            <div class="bg-purple-100 dark:bg-purple-800 border border-purple-300 p-4 rounded shadow">
                <i class="fas fa-book-open text-xl text-purple-700 dark:text-purple-300"></i>
                <h4 class="text-lg font-semibold mt-2">STATUS <strong>IDM</strong></h4>
                <p class="text-lg mt-1 font-semibold
                    @if ($summaries->STATUS === 'MANDIRI') text-green-600 dark:text-green-300
                    @elseif ($summaries->STATUS === 'MAJU') text-blue-600 dark:text-blue-300
                    @elseif ($summaries->STATUS === 'BERKEMBANG') text-yellow-600 dark:text-yellow-300
                    @else text-red-600 dark:text-red-300 @endif">
                    {{ $summaries->STATUS }}
                </p>
            </div>
            <div class="bg-green-100 border border-green-300 p-4 rounded shadow">
                <i class="far fa-star text-xl text-green-700"></i>
                <h4 class="text-lg font-semibold mt-2"><strong>TARGET</strong> STATUS</h4>
                <p class="text-lg mt-1">{{ $summaries->TARGET_STATUS }}</p>
            </div>
            <div class="bg-yellow-100 border border-yellow-300 p-4 rounded shadow">
                <i class="far fa-edit text-xl text-yellow-700"></i>
                <h4 class="text-lg font-semibold mt-2">SKOR <strong>IDM MINIMAL</strong></h4>
                <p class="text-lg mt-1">{{ number_format($summaries->SKOR_MINIMAL, 4) }}</p>
            </div>
        </div>

        <!-- Grafik -->
        <div class="mt-10">
            <div id="container" class="h-96 bg-white border border-gray-300 rounded"></div>
        </div>

        <!-- Tabel Indikator -->
        <div class="mt-10">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border border-gray-300">
                    <thead class="bg-gray-100 text-gray-800">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">INDIKATOR IDM</th>
                            <th class="px-4 py-2 border">SKOR</th>
                            <th class="px-4 py-2 border">KETERANGAN</th>
                            <th class="px-4 py-2 border">KEGIATAN YANG DAPAT DILAKUKAN</th>
                            <th class="px-4 py-2 border">+NILAI</th>
                            <th class="px-4 py-2 border">PUSAT</th>
                            <th class="px-4 py-2 border">PROVINSI</th>
                            <th class="px-4 py-2 border">KABUPATEN</th>
                            <th class="px-4 py-2 border">DESA</th>
                            <th class="px-4 py-2 border">CSR</th>
                            <th class="px-4 py-2 border">LAINNYA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($row as $data)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $data->NO }}</td>
                            <td class="px-4 py-2 border">{{ $data->INDIKATOR }}</td>
                            <td class="px-4 py-2 border">{{ $data->SKOR }}</td>
                            <td class="px-4 py-2 border">{{ $data->KETERANGAN }}</td>
                            <td class="px-4 py-2 border">{{ $data->KEGIATAN }}</td>
                            <td class="px-4 py-2 border">{{ $data->NILAI }}</td>
                            <td class="px-4 py-2 border">{{ $data->PUSAT }}</td>
                            <td class="px-4 py-2 border">{{ $data->PROV }}</td>
                            <td class="px-4 py-2 border">{{ $data->KAB }}</td>
                            <td class="px-4 py-2 border">{{ $data->DESA }}</td>
                            <td class="px-4 py-2 border">{{ $data->CSR }}</td>
                            <td class="px-4 py-2 border">{{ $data->LAINNYA }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@include('showcase.idmjs')
@endsection
