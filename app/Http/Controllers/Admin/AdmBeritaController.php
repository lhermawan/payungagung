<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('Admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('Admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = new Berita($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $berita->image = 'storage/' . $imagePath;
        }

        $berita->save();
        Alert::info('Success', 'Berita created successfully!');
        return redirect('/admin/berita');
    }

    public function show(Berita $berita)
    {
        return view('Admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('Admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $berita->image = 'storage/' . $imagePath;
        }

        $berita->save();
        Alert::info('Success', 'Berita has been updated!');
        return redirect('/admin/berita');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image && file_exists(public_path($berita->image))) {
            unlink(public_path($berita->image));
        }

        $deleted = $berita->delete();

        if ($deleted) {
            Alert::info('Success', 'Berita has been deleted!');
        } else {
            Alert::error('Error', 'Failed to delete berita!');
        }

        return redirect('/admin/berita');
    }
}
