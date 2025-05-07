<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Visitors;

use Illuminate\Pagination\LengthAwarePaginator;

class SCUmurController extends Controller
{

    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');




    }
    public function index(Request $request)
{
    // URL for fetching gender data
    $url = '/summary/umur?secret_key=' . $this->secret_key . '&kode_desa=' . $this->kd_desa;
    $host = $this->p_host . $url;
    $client = new Client(['verify' => false]);

    try {
        $request = $client->request('GET', $host);
    } catch (\Exception $e) {
        $error = $e->getResponse();
        $request = $client->request('GET', $host);
    }

    $a = $request->getBody()->getContents();
    $data['s_umur'] = json_decode($a);

    $umur = $data['s_umur'];
    $encodedSku = json_encode($umur);
    // dd($umur);
    $umur = collect($umur)->map(function($item) {
        $item->y = (int) str_replace('.', '', $item->y); // konversi '2.433' ke 2433
        return $item;
    })->all();
    // Calculate the totalJumlah (sum of all 'jumlah' fields)
    $totalJumlah = collect($umur)->sum('y');

    // Paginasi
    $encodedLabel = json_encode($umur);
    $arry = collect(json_decode($encodedLabel));

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 10; // number of data per page

    $currentItems = $arry->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $data1 = new LengthAwarePaginator(
        $currentItems,
        $arry->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    // Menghitung jumlah pengunjung
    $halaman = 'data_umur';
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
    return view('showcase.demografi.scumur', $data, compact('encodedSku', 'umur', 'halaman', 'visitors', 'data1', 'totalJumlah'));
}

}
