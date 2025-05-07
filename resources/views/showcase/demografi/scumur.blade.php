@extends('navbar-tailwind.navbar')
@section('title', 'Statistik Jenis Kelamin')

@section('content')
<div class="container mx-auto py-8 px-4 flex flex-col gap-3 md:px-20 mt-20">
    <h2 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0">
        <span class="text-center">
            <b class="is-visible"></b>
            <b>DATA</b><span class="text-blue-500"> <b>UMUR WARGA PAYUNGAGUNG</b></span>
        </span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Chart --}}
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <div id="umurChart"></div>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <div class="overflow-x-auto">
                <table class="table table-striped table-hover table-bordered w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori Umur</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($umur as $i => $data)
                        <tr>
                            <td class="px-6 py-4 text-center">{{ $i + 1 }}</td>
                            <td class="px-6 py-4">{{ $data->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $data->y }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-100 font-bold">
                        <tr>
                            <td colspan="2" class="px-6 py-3 text-right">Total</td>
                            <td class="text-center">{{ $totalJumlah }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mt-4 flex justify-center">
                {{ $data1->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            chart: {
                type: 'bar',
                height: 400
            },
            series: [{
                name: 'Jumlah',
                data: {!! json_encode(collect($umur)->pluck('y')) !!}
            }],
            xaxis: {
                categories: {!! json_encode(collect($umur)->pluck('name')) !!},
                title: {
                    text: 'Kelompok Umur'
                }
            },
            plotOptions: {
                bar: {
                    distributed: true,
                    borderRadius: 4,
                    columnWidth: '50%'
                }
            },
            colors: [
                '#1E3A8A', '#2563EB', '#3B82F6', '#60A5FA',
                '#93C5FD', '#FBBF24', '#F59E0B', '#EF4444',
                '#10B981', '#6EE7B7', '#8B5CF6', '#EC4899',
                '#F87171'
            ],
            title: {
                text: 'Statistik Penduduk Berdasarkan Umur',
                align: 'center',
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            },
            dataLabels: {
                enabled: true
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " orang";
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#umurChart"), options);
        chart.render();
    });
</script>
@endsection

