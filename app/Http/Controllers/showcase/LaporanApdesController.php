<?php

namespace App\Http\Controllers\showcase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\Visitors;
use Illuminate\Http\Client\Response;
use App\Models\Header;

class LaporanApdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {

        $this->api_key =env('API_KEY');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->kd_desa= env('K_DESA');
        $this->m_key= env('M_KEY');

    }

    public function index()
{
    $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

    if ($visitors) {
        if (session('session') != true) {
            session(['session' => true]);
            $visitors->jumlah = $visitors->jumlah + 1;
            $visitors->save();
        }
    } else {
        $visitors = Visitors::create([
            'id_desa_skpd' => $this->id_desa,
            'jumlah' => 1
        ]);
    }

    $url = '/api/ciamis/pegawaidesa/';
    $host = $this->e_host . $url;

    $response = Http::withHeaders([
        'C-KEY' => $this->api_key
    ])->GET($host, [
        'id_skpd' => $this->id_desa,
    ]);

    $a = json_decode($response->body(), true);
    $data['pegawaidesa'] = $a;

    $url2 = '/api/ciamis/siskedes_sekarang';
    $host2 = $this->e_host . $url2;

    $body = [
        'kd_desa' => $this->kd_desa,
        'key' => $this->m_key
    ];
    $r_siskedes = Http::withBody(json_encode($body), 'application/json')
        ->post($host2);

    $dt_desa = json_decode($r_siskedes->body(), true);
    $data['datadesa'] = $dt_desa;

    // Kategori unik
    $categories = collect($data['datadesa']['data'])->pluck('Kategori')->unique()->filter()->values();

    $data['halaman'] = 'landingpage';
    $header = Header::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->limit(3)->get();

    return view('showcase.laporan_apdes', compact('header', 'data', 'categories'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
