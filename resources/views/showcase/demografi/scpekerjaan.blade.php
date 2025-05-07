@extends('navbar-tailwind.navbar')
@section('title', 'Statistik Pekerjaan')

@section('content')
<div class="container mx-auto py-8 px-4 flex flex-col gap-3 md:px-20 mt-20">
    <h2 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0">
        <span class="text-center">
            <b class="is-visible"></b>
            <b>DATA</b><span class="text-blue-500"> <b>PEKERJAAN WARGA PAYUNGAGUNG</span></b>
        </span>
    </h2>

    {{-- Flexbox Layout for Chart and Table --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Chart on the Left --}}
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <div id="jobChart"></div>
        </div>

        {{-- Table on the Right --}}
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <div class="overflow-x-auto">
                <table class="table table-striped table-hover table-bordered w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($data1 as $key => $data)
                        <tr>
                            <td class="px-6 py-4 text-center">{{ ++$key }}</td>
                            <td class="px-6 py-4">{{ $data->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $data->y }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
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
    var options = {
        series: {!! json_encode($data1->pluck('y')) !!},
        chart: {
            type: 'pie',
            height: 400,
        },
        labels: {!! json_encode($data1->pluck('name')) !!},
        colors: ['#1E40AF', '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#6366F1', '#EC4899', '#14B8A6', '#F43F5E', '#8B5CF6'],
        title: {
            text: 'Statistik Pekerjaan Warga',
            align: 'center',
            style: {
                fontSize: '20px',
                fontWeight: 'bold',
                color: '#111'
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
    return val.toFixed(1) + "%";
},
            style: {
                fontSize: '14px',
                fontWeight: 'bold'
            }
        },
        legend: {
            position: 'bottom'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " orang";
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#jobChart"), options);
    chart.render();
</script>
@endsection

