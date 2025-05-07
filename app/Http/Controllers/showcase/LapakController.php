<?php

namespace App\Http\Controllers\showcase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Lapakdesa};
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class LapakController extends Controller
{

    public function index()
    {

        $lapakdesas = Lapakdesa::all();

        return view('showcase.lapakdesa', [
            'lapakdesas' => $lapakdesas
        ]);
    }
}
