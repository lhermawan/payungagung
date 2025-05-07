<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class LuasWilayahController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('demografi.luaswilayah.luaswilayah');
    }

    public function show(Penduduk $penduduk) {}
}
