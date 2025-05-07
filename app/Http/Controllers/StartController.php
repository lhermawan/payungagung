<?php

namespace App\Http\Controllers;

use App\Models\{Penduduk, Disabilitas, Sejarah, Lapakdesa, Berita};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{
    public function index(Request $request)
    {
        $penduduk = Penduduk::all();


        $penduduk = Penduduk::count();
        $disabilitas = Disabilitas::count();
        $pekerjaanCount = Penduduk::distinct('pekerjaan')->count('pekerjaan');
        $jumlahKeluarga = Penduduk::distinct('no_kk')->count('no_kk');
        $pekerjaanStats = Penduduk::select('pekerjaan', DB::raw('count(*) as jumlah'))
            ->whereNotIn('pekerjaan', ['Mengurus Rumah Tangga', 'Belum/Tidak Bekerja', 'Pelajar/Mahasiswa']) // Pengecualian pekerjaan
            ->groupBy('pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->get();

        $mostCommonJob = $pekerjaanStats->first();
        $mostCommonJobName = $mostCommonJob ? $mostCommonJob->pekerjaan : 'Tidak Diketahui';
        $mostCommonJobCount = $mostCommonJob ? $mostCommonJob->jumlah : 0;

        $lapakdesas = Lapakdesa::all();
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->first();

        return view('start', [
            'penduduk' => $penduduk,
            'disabilitas' => $disabilitas,
            'pekerjaanCount' => $pekerjaanCount,
            'jumlahKeluarga' => $jumlahKeluarga,
            'mostCommonJobName' => $mostCommonJobName,
            'mostCommonJobCount' => $mostCommonJobCount,
            'lapakdesas' => $lapakdesas,
            'beritaTerbaru' => $beritaTerbaru,

        ]);
    }
}
