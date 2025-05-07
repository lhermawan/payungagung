<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lapakdesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmLapakController extends Controller
{
    public function index()
    {
        $lapakdesas = Lapakdesa::all();
        return view('Admin.lapakdesa.index', compact('lapakdesas'));
    }

    public function create()
    {
        return view('Admin.lapakdesa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:40',
            'deskripsi' => 'nullable|string',
            'mitra' => 'required|string|max:255',
            'link_wa' => 'nullable|url',
            'link_maps' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lapakdesa = new Lapakdesa($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $lapakdesa->image = 'storage/' . $imagePath;
        }

        $lapakdesa->save();
        Alert::info('Success', 'Lapak Desa created successfully!');
        return redirect('/admin/lapakdesa');
    }

    public function show(Lapakdesa $lapakdesa)
    {
        return view('Admin.lapakdesa.show', compact('lapakdesa'));
    }

    public function edit(Lapakdesa $lapakdesa)
    {
        return view('Admin.lapakdesa.edit', compact('lapakdesa'));
    }

    public function update(Request $request, Lapakdesa $lapakdesa)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:40',
            'deskripsi' => 'nullable|string',
            'mitra' => 'required|string|max:255',
            'link_wa' => 'nullable|url',
            'link_maps' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lapakdesa->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $lapakdesa->image = 'storage/' . $imagePath;
        }

        $lapakdesa->save();
        Alert::info('Success', 'Lapak Desa has been updated!');
        return redirect()->route('admin.lapakdesa.index');
    }


    public function destroy(Lapakdesa $lapakdesa)
    {
        if ($lapakdesa->image && file_exists(public_path($lapakdesa->image))) {
            unlink(public_path($lapakdesa->image));
        }

        $lapakdesa->delete();
        Alert::info('Success', 'Lapak Desa has been deleted!');
        return redirect('/admin/lapakdesa');
    }
}
