<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Disabilitas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class MasterDisabilitasController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if ($user->level == 'Admin') {
            $disabilitas = Disabilitas::join('t_penduduk', 't_disabilitas.nik', '=', 't_penduduk.nik')
                ->orderBy('t_disabilitas.id_disabilitas', 'asc')
                ->get(['t_disabilitas.*', 't_penduduk.nama as penduduk_nama']);
        } else {
            $disabilitas = Disabilitas::join('t_penduduk', 't_disabilitas.nik', '=', 't_penduduk.nik')
                ->where('t_penduduk.dusun', $user->level)
                ->orderBy('t_disabilitas.id_disabilitas', 'asc')
                ->get(['t_disabilitas.*', 't_penduduk.nama as penduduk_nama']);
        }

        return view('master.disabilitas.disabilitas', [
            'disabilitas' => $disabilitas
        ]);
    }


    public function create()
    {
        $penduduk = Penduduk::orderBy('nik', 'asc')->get();

        return view('master.disabilitas.disabilitas-add', [
            'penduduk' => $penduduk
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|max:100|unique:t_disabilitas',
            'kategori' => 'required|max:100',
            'dusun' => 'required|max:50',
        ]);
        $nikExists = Penduduk::where('nik', $validated['nik'])->exists();
        if (!$nikExists) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan dalam database penduduk'])->withInput();
        }

        $disabilitas = Disabilitas::create($request->all());

        Alert::success('Success', 'Disabilitas has been saved!');
        return redirect('/mdisabilitas');
    }

    public function edit($id_disabilitas)
    {
        $disabilitas = Disabilitas::join('t_penduduk', 't_disabilitas.nik', '=', 't_penduduk.nik')
            ->where('t_disabilitas.id_disabilitas', $id_disabilitas)
            ->first(['t_disabilitas.*', 't_penduduk.nama as penduduk_nama']);

        $penduduk = Penduduk::orderBy('nik', 'asc')->get();

        return view('master.disabilitas.disabilitas-edit', [
            'disabilitas' => $disabilitas,
            'penduduk' => $penduduk
        ]);
    }

    public function update(Request $request, $id_disabilitas)
    {
        $validated = $request->validate([
            'nik' => 'required|exists:t_penduduk,nik',
            'kategori' => 'required|in:Fisik,Ganda,Mental,Sensorik',
            'dusun' => 'required|max:50'
        ]);

        $disabilitas = Disabilitas::findOrFail($id_disabilitas);
        $disabilitas->update($validated);

        Alert::info('Success', 'Disabilitas has been updated!');
        return redirect('/mdisabilitas');
    }
    public function destroy($id_disabilitas)
    {
        try {
            $deleteddisabilitas = Disabilitas::findOrFail($id_disabilitas);

            $deleteddisabilitas->delete();

            Alert::error('Success', 'Disabilitas has been deleted!');
            return redirect('/mdisabilitas');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Can\'t delete, Disabilitas already used!');
            return redirect('/mdisabilitas');
        }
    }
}
