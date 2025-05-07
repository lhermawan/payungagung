<?php

namespace App\Http\Controllers;

use App\Models\KIS;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;


class MasterKISController extends Controller
{
    public function index()
    {
        $kis = KIS::orderBy('jenis', 'asc')->get();

        return view('master.kis.kis', [
            'kis' => $kis
        ]);
    }


    public function create()
    {
        return view('master.kis.kis-add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|max:40|unique:t_kis',
            'kategori' => 'required|max:40',
            'keterangan' => 'required|max:40',
        ]);

        $kis = KIS::create($request->all());

        Alert::success('Success', 'KIS has been saved !');
        return redirect('/master/kis');
    }

    public function edit($id_kis)
    {
        $kis = KIS::findOrFail($id_kis);
        $kisList = KIS::orderBy('jenis', 'asc')->get();

        return view('master.kis.kis-edit', [
            'kis' => $kis,
            'kisList' => $kisList,
        ]);
    }


    public function update(Request $request, $id_kis)
    {
        $validated = $request->validate([
            'jenis' => 'required|max:40|unique:t_kis,jenis,' . $id_kis . ',id_kis',
            'kategori' => 'required|max:40',
            'keterangan' => 'required|max:40',
        ]);

        $kis = KIS::findOrFail($id_kis);
        $kis->update($validated);

        Alert::info('Success', 'KIS has been updated !');
        return redirect('/master/kis');
    }

    public function destroy($id_kis)
    {
        try {
            $deletedkis = KIS::findOrFail($id_kis);

            $deletedkis->delete();

            Alert::error('Success', 'KIS has been deleted !');
            return redirect('/master/kis');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, KIS already used !');
            return redirect('/master/kis');
        }
    }
}
