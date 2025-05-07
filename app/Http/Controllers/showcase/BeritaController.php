<?php

namespace App\Http\Controllers\showcase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Berita};
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class BeritaController extends Controller
{

    public function index()
    {

        $beritas = Berita::all();

        return view('showcase.berita', [
            'beritas' => $beritas
        ]);
    }
}
