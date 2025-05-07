<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Http\Controllers\Controller;
use App\Models\Disabilitas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class SCDisabilitasController extends Controller
{

    public function index()
    {

        $dusuns = [
            'Pamekaran',
            'Cimaja',
            'Cimanglid',
            'Limusagung',
            'Mangunjaya',
            'Nanggeleng',
            'Darawati'
        ];

        $data = [];

        foreach ($dusuns as $dusun) {
            $counts = Disabilitas::join('t_penduduk', 't_disabilitas.nik', '=', 't_penduduk.nik')
                ->where('t_penduduk.dusun', $dusun)
                ->selectRaw('
                    COUNT(CASE WHEN kategori = "Fisik" THEN 1 END) as fisik,
                    COUNT(CASE WHEN kategori = "Ganda" THEN 1 END) as ganda,
                    COUNT(CASE WHEN kategori = "Mental" THEN 1 END) as mental,
                    COUNT(CASE WHEN kategori = "Sensorik" THEN 1 END) as sensorik
                ')
                ->first();

            $total = $counts->fisik + $counts->ganda + $counts->mental + $counts->sensorik;

            $data[] = [
                'dusun' => $dusun,
                'fisik' => $counts->fisik,
                'ganda' => $counts->ganda,
                'mental' => $counts->mental,
                'sensorik' => $counts->sensorik,
                'total' => $total,
            ];
        }

        return view('showcase.demografi.scdisabilitas', ['data' => $data]);
    }
}
