<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class SCAgamaController extends Controller
{

    public function index()
    {

        $penduduk = Penduduk::orderBy('nik', 'asc')->get();


        $agamaCategories = [
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Konghucu'
        ];

        $agamaData = [];

        foreach ($agamaCategories as $agama) {
            $total = $penduduk->where('agama', $agama)->count();
            $laki_laki = $penduduk->where('agama', $agama)->where('jenis_kelamin', 'Laki-laki')->count();
            $perempuan = $penduduk->where('agama', $agama)->where('jenis_kelamin', 'Perempuan')->count();

            $jumlahPercent = $total ? ($total / $penduduk->count()) * 100 : 0;
            $lakiLakiPercent = $total ? ($laki_laki / $total) * 100 : 0;
            $perempuanPercent = $total ? ($perempuan / $total) * 100 : 0;

            $agamaData[] = [
                'agama' => $agama,
                'jumlah_n' => $total,
                'jumlah_percent' => number_format($jumlahPercent, 2),
                'laki_laki_n' => $laki_laki,
                'laki_laki_percent' => number_format($lakiLakiPercent, 2),
                'perempuan_n' => $perempuan,
                'perempuan_percent' => number_format($perempuanPercent, 2),
            ];
        }

        // Calculate totals
        $total_jumlah_n = array_sum(array_column($agamaData, 'jumlah_n'));
        $total_jumlah_percent = $total_jumlah_n ? number_format(($total_jumlah_n / $penduduk->count()) * 100, 2) : 0;
        $total_laki_laki_n = array_sum(array_column($agamaData, 'laki_laki_n'));
        $total_laki_laki_percent = $total_jumlah_n ? number_format(($total_laki_laki_n / $total_jumlah_n) * 100, 2) : 0;
        $total_perempuan_n = array_sum(array_column($agamaData, 'perempuan_n'));
        $total_perempuan_percent = $total_jumlah_n ? number_format(($total_perempuan_n / $total_jumlah_n) * 100, 2) : 0;

        return view('showcase.demografi.scagama', [
            'penduduk' => $penduduk,
            'agamaData' => $agamaData,
            'total_jumlah_n' => $total_jumlah_n,
            'total_jumlah_percent' => $total_jumlah_percent,
            'total_laki_laki_n' => $total_laki_laki_n,
            'total_laki_laki_percent' => $total_laki_laki_percent,
            'total_perempuan_n' => $total_perempuan_n,
            'total_perempuan_percent' => $total_perempuan_percent,
        ]);
    }
}
