<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmVisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::all();
        return view('Admin.visi-misi.index', compact('visiMisi'));
    }

    public function show(VisiMisi $visiMisi)
    {
        return view('Admin.visi-misi.show', compact('visiMisi'));
    }

    public function edit(VisiMisi $visiMisi)
    {
        return view('Admin.visi-misi.edit', compact('visiMisi'));
    }

    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $visiMisi->update($request->all());
        Alert::info('Success', 'Visi & Misi has been updated!');
        return redirect('/admin/visi-misi');
    }

    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();
        Alert::info('Success', 'Visi & Misi has been deleted!');
        return redirect('/admin/visi-misi');
    }
}
