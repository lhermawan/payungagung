@extends('navbar-tailwind.navbar')
@section('title', 'Luas Wilayah')

@section('content')
@php
    $dusuns = [
        ['name' => 'Pamekaran', 'luas' => 217, 'rw' => 2, 'rt' => 8],
        ['name' => 'Cimanglid', 'luas' => 185, 'rw' => 2, 'rt' => 7],
        ['name' => 'Cimaja', 'luas' => 158, 'rw' => 1, 'rt' => 3],
        ['name' => 'Limusagung', 'luas' => 47, 'rw' => 1, 'rt' => 2],
        ['name' => 'Mangunjaya', 'luas' => 22, 'rw' => 1, 'rt' => 4],
        ['name' => 'Darawati', 'luas' => 80, 'rw' => 1, 'rt' => 2],
        ['name' => 'Nanggeleng', 'luas' => 74.34, 'rw' => 1, 'rt' => 4],
    ];
    $totalLuas = collect($dusuns)->sum('luas');
    $totalRW = collect($dusuns)->sum('rw');
    $totalRT = collect($dusuns)->sum('rt');
@endphp

<div class="container mx-auto py-8 px-4 flex flex-col gap-3 md:px-20 mt-20">
    <h2 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0">
        <span class="text-center">
            <b class="is-visible"></b>
            <b>DATA</b><span class="text-blue-500"> <b>LUAS WILAYAH DUSUN PAYUNGAGUNG</b></span>
        </span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Chart --}}
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <div id="luasChart"></div>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <div class="overflow-x-auto">
                <table class="table table-striped table-hover table-bordered w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dusun</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Luas (Ha)</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">RW</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">RT</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($dusuns as $i => $dusun)
                        <tr>
                            <td class="px-6 py-4 text-center">{{ $i + 1 }}</td>
                            <td class="px-6 py-4">{{ $dusun['name'] }}</td>
                            <td class="px-6 py-4 text-center">{{ $dusun['luas'] }}</td>
                            <td class="px-6 py-4 text-center">{{ $dusun['rw'] }}</td>
                            <td class="px-6 py-4 text-center">{{ $dusun['rt'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-100 font-bold">
                        <tr>
                            <td colspan="2" class="px-6 py-3 text-right">Total</td>
                            <td class="text-center">{{ $totalLuas }}</td>
                            <td class="text-center">{{ $totalRW }}</td>
                            <td class="text-center">{{ $totalRT }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
    series: [{
        name: 'Luas Wilayah',
        data: {!! json_encode(collect($dusuns)->pluck('luas')) !!}
    }],
    chart: {
        type: 'area',
        height: 400,
    },
    labels: {!! json_encode(collect($dusuns)->pluck('name')) !!},
    colors: ['#1E40AF', '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#6366F1', '#14B8A6'],
    fill: {
        opacity: 0.3 // Menentukan tingkat transparansi area chart
    },
    xaxis: {
        categories: {!! json_encode(collect($dusuns)->pluck('name')) !!},
        title: {
            text: 'Dusun'
        }
    },
    yaxis: {
        title: {
            text: 'Luas (Ha)'
        }
    },
    title: {
        text: 'Luas Wilayah per Dusun',
        align: 'center',
        style: {
            fontSize: '20px',
            fontWeight: 'bold',
            color: '#111'
        }
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " ha";
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#luasChart"), options);
chart.render().then(() => {
    console.log("Area Chart successfully rendered!");
}).catch((error) => {
    console.error("Chart rendering failed:", error);
});
</script>
@endsection
