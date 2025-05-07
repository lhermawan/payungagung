<?php

namespace App\Http\Controllers\showcase\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sejarah;
use App\Models\Visitors;

class SejarahController extends Controller
{

    function __construct() {

        $this->id_desa =env('ID_DESA');

    }
    public function index(Request $request)
    {


        $halaman = 'sejarah_desa';
        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

        if($visitors) {
            // session(['session'=>false]);
            if(session('session') != true){
                session(['session'=>true]);
                $visitors->jumlah = $visitors->jumlah + 1;
                $visitors->save();
            }
        }else{
            $visitors = Visitors::create([
                'id_desa_skpd'=> $this->id_desa,
                'jumlah' => 1
            ]);

        }
//        $sejarah = Sejarah::all();
        $sejarah = Sejarah::where('id_desa_skpd', $this->id_desa)->get();

        // dd($sejarah);
        return view('showcase.profile.sejarah', compact('sejarah','halaman', 'visitors'));
    }

}
