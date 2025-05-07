<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;


class MasterPekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::orderBy('nama', 'asc')->get();

        return view('master.pekerjaan.pekerjaan', [
            'pekerjaan' => $pekerjaan
        ]);
    }


    public function create()
    {
        return view('master.pekerjaan.pekerjaan-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:100|unique:t_pekerjaan',
        ]);

        $pekerjaan = Pekerjaan::create($request->all());

        Alert::success('Success', 'Pekerjaan has been saved !');
        return redirect('/master/pekerjaan');
    }

    public function edit($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaanList = Pekerjaan::orderBy('nama', 'asc')->get();

        return view('master.pekerjaan.pekerjaan-edit', [
            'pekerjaan' => $pekerjaan,
            'pekerjaanList' => $pekerjaanList,
        ]);
    }


    public function update(Request $request, $id_pekerjaan)
    {
        $validated = $request->validate([
            'nama' => 'required|max:100|unique:t_pekerjaan,nama,' . $id_pekerjaan . ',id_pekerjaan',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->update($validated);

        Alert::info('Success', 'Pekerjaan has been updated !');
        return redirect('/master/pekerjaan');
    }

    public function destroy($id_pekerjaan)
    {
        try {
            $deletedpekerjaan = Pekerjaan::findOrFail($id_pekerjaan);

            $deletedpekerjaan->delete();

            Alert::error('Success', 'Pekerjaan has been deleted !');
            return redirect('/master/pekerjaan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Pekerjaan already used !');
            return redirect('/master/pekerjaan');
        }
    }
}
