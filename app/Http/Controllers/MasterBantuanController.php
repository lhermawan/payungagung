<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;


class MasterBantuanController extends Controller
{

    public function index()
    {
        $bantuan = Bantuan::orderBy('jenis', 'asc')->get();

        return view('master.bantuan.bantuan', [
            'bantuan' => $bantuan
        ]);
    }


    public function create()
    {
        return view('master.bantuan.bantuan-add');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|max:40|unique:t_bantuan',
        ]);

        $bantuan = Bantuan::create($request->all());

        Alert::success('Success', 'Jenis Bantuan has been saved !');
        return redirect('/master/bantuan');
    }


    public function edit($id_bantuan)
    {
        $bantuan = Bantuan::findOrFail($id_bantuan);
        $bantuanList = Bantuan::orderBy('jenis', 'asc')->get();

        return view('master.bantuan.bantuan-edit', [
            'bantuan' => $bantuan,
            'bantuanList' => $bantuanList,
        ]);
    }



    public function update(Request $request, $id_bantuan)
    {
        $validated = $request->validate([
            'jenis' => 'required|max:40|unique:t_bantuan,jenis,' . $id_bantuan . ',id_bantuan'
        ]);

        $bantuan = Bantuan::findOrFail($id_bantuan);
        $bantuan->update($validated);

        Alert::info('Success', 'Jenis Bantuan has been updated !');
        return redirect('/master/bantuan');
    }

    public function destroy($id_bantuan)
    {
        try {
            $deletedbantuan = Bantuan::findOrFail($id_bantuan);

            $deletedbantuan->delete();

            Alert::error('Success', 'Jenis Bantuan has been deleted !');
            return redirect('/master/bantuan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Jenis Bantuan already used !');
            return redirect('/master/bantuan');
        }
    }
}
