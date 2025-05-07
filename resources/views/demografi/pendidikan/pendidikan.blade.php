@extends('template.main')
@section('title', 'Pendidikan')
@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Statistik Pendidikan Penduduk</h3>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Jenis Pendidikan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data1 as $i => $item)
                    <tr>
                        <td>{{ $data1->firstItem() + $i }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->y }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data1->links() }} {{-- Pagination --}}
    </div>

    {{-- Grafik --}}
    <div class="mt-5">
        <canvas id="pendidikanChart" height="120"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const pendidikanData = {!! $encodedSku !!};

    const labels = pendidikanData.map(item => item.name);
    const data = pendidikanData.map(item => item.y);

    const ctx = document.getElementById('pendidikanChart').getContext('2d');
    const pendidikanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Penduduk',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    });
</script>
@endsection
