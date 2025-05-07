<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class SCLuasWilayahController extends Controller
{

    public function index()
    {
        return view('showcase.demografi.scluaswilayah');
    }

    public function show(Penduduk $penduduk) {}
}
