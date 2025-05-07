<?php

namespace App\Http\Controllers;

use App\Models\{Disabilitas, Penduduk};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->level == 'Admin') {
            $penduduk = Penduduk::count();
            $disabilitas = Disabilitas::count();
            $pekerjaanCount = Penduduk::distinct('pekerjaan')->count('pekerjaan');
            $jumlahKeluarga = Penduduk::distinct('no_kk')->count('no_kk');
        } else {
            $penduduk = Penduduk::where('dusun', $user->level)->count();
            $disabilitas = Disabilitas::where('dusun', $user->level)->count();
            $pekerjaanCount = Penduduk::where('dusun', $user->level)->distinct('pekerjaan')->count('pekerjaan');
            $jumlahKeluarga = Penduduk::where('dusun', $user->level)->distinct('no_kk')->count('no_kk');
        }

        return view('dashboard.dashboard', [
            'penduduk' => $penduduk,
            'disabilitas' => $disabilitas,
            'pekerjaanCount' => $pekerjaanCount,
            'jumlahKeluarga' => $jumlahKeluarga,
        ]);
    }
}
