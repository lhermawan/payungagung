<?php

namespace App\Http\Controllers\showcase\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;
use App\Models\Visitors;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Header;
class AparatController extends Controller
{

    function __construct() {

        $this->api_key =env('API_KEY');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->kd_desa= env('K_DESA');

    }

    public function index()
    {

        $url='/api/ciamis/pegawaidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);




        $a = json_decode($response->body(), true);
        $data['pegawaidesa'] = $a;

        $url2='/api/ciamis/siskedes/';
        $host2=$this->e_host.$url2;


        $r_siskedes = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host2, [
            'kd_desa' => $this->kd_desa,
        ]);
        $link = $this->e_host;
        $dt_desa = json_decode($r_siskedes->body(), true);
        $data['datadesa'] = $dt_desa;
        $halaman = 'aparatur_desa';
//        $header = Header::all();
        $header = Header::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('showcase.profile.aparat', $data, compact('header', 'data', 'halaman', 'link'));


    }

}
