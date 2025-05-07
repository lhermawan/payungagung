<?php

namespace App\Http\Controllers;

use App\Models\{Penduduk, Pekerjaan, KIS, Bantuan};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $search = $request->input('search');

        if ($user->level == 'Admin') {
            $penduduk = Penduduk::when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nik', 'like', "%{$search}%")
                        ->orWhere('no_kk', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('bantuan', 'like', "%{$search}%")
                        ->orWhere('kis', 'like', "%{$search}%");
                });
            })->orderBy('nik', 'asc')->paginate(10);
        } else {
            $penduduk = Penduduk::where('dusun', $user->level)
                ->when($search, function ($query) use ($search) {
                    return $query->where(function ($q) use ($search) {
                        $q->where('nik', 'like', "%{$search}%")
                            ->orWhere('no_kk', 'like', "%{$search}%")
                            ->orWhere('nama', 'like', "%{$search}%")
                            ->orWhere('bantuan', 'like', "%{$search}%")
                            ->orWhere('kis', 'like', "%{$search}%");
                    });
                })->orderBy('nik', 'asc')->paginate(10);
        }

        return view('master.penduduk.penduduk', [
            'penduduk' => $penduduk
        ]);
    }




    public function create()
    {
        $pekerjaanList = Pekerjaan::orderBy('nama', 'asc')->get();
        $kisList = KIS::orderBy('jenis', 'asc')->get();
        $bantuanList = Bantuan::orderBy('jenis', 'asc')->get();

        return view('master.penduduk.penduduk-add', [
            'pekerjaanList' => $pekerjaanList,
            'kisList' => $kisList,
            'bantuanList' => $bantuanList
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits_between:1,16|unique:t_penduduk',
            'no_kk' => 'required|digits_between:1,16',
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|max:20',
            'alamat' => 'required|max:100',
            'rt' => 'required|max:5',
            'rw' => 'required|max:50',
            'dusun' => 'required|max:50',
            'agama' => 'required|max:20',
            'status_perkawinan' => 'required|max:20',
            'pendidikan' => 'required|max:50',
            'pekerjaan' => 'required|max:40',
            'golongan_darah' => 'required|max:20',
            'shdk' => 'required|max:20',
            'bantuan' => 'required|max:40',
            'kis' => 'required|max:40',
            'ayah' => 'required|max:50',
            'ibu' => 'required|max:50',
            'kepala_keluarga' => 'required|max:50',
        ]);

        Penduduk::create($validated);

        Alert::success('Success', 'Penduduk has been saved!');
        return redirect('/penduduk');
    }





    public function show(Penduduk $penduduk) {}


    public function edit($nik)
    {
        $penduduk = Penduduk::with('pekerjaan')->findOrFail($nik); // Mengambil penduduk beserta relasi pekerjaan
        $penduduk = Penduduk::with('kis')->findOrFail($nik); // Mengambil penduduk beserta relasi jkn-kis
        $pekerjaanList = Pekerjaan::orderBy('nama', 'asc')->get(); // Mengambil semua pekerjaan untuk dropdown
        $kisList = KIS::orderBy('jenis', 'asc')->get(); // Mengambil semua jkn-kis untuk dropdown
        $bantuanList = Bantuan::orderBy('jenis', 'asc')->get(); // Mengambil semua jkn-kis untuk dropdown

        return view('master.penduduk.penduduk-edit', [
            'penduduk' => $penduduk,
            'pekerjaanList' => $pekerjaanList,
            'kisList' => $kisList,
            'bantuanList' => $bantuanList
        ]);
    }




    public function update(Request $request, $nik)
    {
        $validated = $request->validate([
            'nik' => 'required|digits_between:1,16|unique:t_penduduk,nik,' . $nik . ',nik',
            'no_kk' => 'required|digits_between:1,16',
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|max:20',
            'alamat' => 'required|max:100',
            'rt' => 'required|max:5',
            'rw' => 'required|max:50',
            'dusun' => 'required|max:50',
            'agama' => 'required|max:20',
            'status_perkawinan' => 'required|max:20',
            'pendidikan' => 'required|max:50',
            'pekerjaan' => 'required|max:40',
            'golongan_darah' => 'required|max:20',
            'shdk' => 'required|max:20',
            'bantuan' => 'required|max:40',
            'kis' => 'required|max:40',
            'ayah' => 'required|max:50',
            'ibu' => 'required|max:50',
            'kepala_keluarga' => 'required|max:50',
        ]);

        $penduduk = Penduduk::findOrFail($nik);
        $penduduk->update($validated);

        Alert::info('Success', 'Penduduk has been updated!');
        return redirect('/penduduk');
    }


    public function destroy($nik)
    {
        try {
            $deletedpenduduk = Penduduk::findOrFail($nik);

            $deletedpenduduk->delete();

            Alert::error('Success', 'Penduduk has been deleted !');
            return redirect('/penduduk');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Penduduk already used !');
            return redirect('/penduduk');
        }
    }
}
