<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UmurController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->level == 'Admin') {
            $penduduk = Penduduk::orderBy('nik', 'asc')->get();
        } else {
            $penduduk = Penduduk::where('dusun', $user->level)->orderBy('nik', 'asc')->get();
        }

        $umurCategories = [
            'Di bawah 1 Tahun' => [0, 1],
            '2 s/d 4 Tahun' => [2, 4],
            '5 s/d 9 Tahun' => [5, 9],
            '10 s/d 14 Tahun' => [10, 14],
            '15 s/d 19 Tahun' => [15, 19],
            '20 s/d 24 Tahun' => [20, 24],
            '25 s/d 29 Tahun' => [25, 29],
            '30 s/d 34 Tahun' => [30, 34],
            '35 s/d 39 Tahun' => [35, 39],
            '40 s/d 44 Tahun' => [40, 44],
            '45 s/d 49 Tahun' => [45, 49],
            '50 s/d 54 Tahun' => [50, 54],
            '55 s/d 59 Tahun' => [55, 59],
            '60 s/d 64 Tahun' => [60, 64],
            '65 s/d 69 Tahun' => [65, 69],
            '70 s/d 74 Tahun' => [70, 74],
            'Di atas 75 Tahun' => [75, PHP_INT_MAX],
        ];

        $umurData = [];

        foreach ($umurCategories as $label => [$min, $max]) {
            $total = $penduduk->filter(function ($p) use ($min, $max) {
                $age = Carbon::parse($p->tanggal_lahir)->age;
                return $age >= $min && $age <= $max;
            });

            $totalCount = $total->count();
            $lakiLakiCount = $total->where('jenis_kelamin', 'Laki-laki')->count();
            $perempuanCount = $total->where('jenis_kelamin', 'Perempuan')->count();

            $jumlahPercent = $totalCount ? ($totalCount / $penduduk->count()) * 100 : 0;
            $lakiLakiPercent = $totalCount ? ($lakiLakiCount / $totalCount) * 100 : 0;
            $perempuanPercent = $totalCount ? ($perempuanCount / $totalCount) * 100 : 0;

            $umurData[] = [
                'umur' => $label,
                'jumlah_n' => $totalCount,
                'jumlah_percent' => number_format($jumlahPercent, 2),
                'laki_laki_n' => $lakiLakiCount,
                'laki_laki_percent' => number_format($lakiLakiPercent, 2),
                'perempuan_n' => $perempuanCount,
                'perempuan_percent' => number_format($perempuanPercent, 2),
            ];
        }

        $total_jumlah_n = array_sum(array_column($umurData, 'jumlah_n'));
        $total_laki_laki_n = array_sum(array_column($umurData, 'laki_laki_n'));
        $total_perempuan_n = array_sum(array_column($umurData, 'perempuan_n'));

        return view('demografi.umur.umur', [
            'penduduk' => $penduduk,
            'umurData' => $umurData,
            'total_jumlah_n' => $total_jumlah_n,
            'total_laki_laki_n' => $total_laki_laki_n,
            'total_perempuan_n' => $total_perempuan_n,
        ]);
    }
}
