<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;
use GuzzleHttp\Client;
use App\Models\Visitors;

use Illuminate\Pagination\LengthAwarePaginator;

class SCJenisKelaminController extends Controller
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
    $url = '/summary/jenis_kelamin?secret_key=' . $this->secret_key . '&kode_desa=' . $this->kd_desa;
    $host = $this->p_host . $url;
    $client = new Client(['verify' => false]);

    try {
        $request = $client->request('GET', $host);
    } catch (\Exception $e) {
        $error = $e->getResponse();
        $request = $client->request('GET', $host);
    }

    $a = $request->getBody()->getContents();
    $data['s_jenis_kelamin'] = json_decode($a);

    $jenis_kelamin = $data['s_jenis_kelamin'];
    $encodedSku = json_encode($jenis_kelamin);
    $jenis_kelamin = collect($jenis_kelamin)->map(function($item) {
        $item->jumlah = (int) str_replace('.', '', $item->jumlah); // konversi '2.433' ke 2433
        return $item;
    })->all();
    // Calculate the totalJumlah (sum of all 'jumlah' fields)
    $totalJumlah = collect($jenis_kelamin)->sum('jumlah');

    // Paginasi
    $encodedLabel = json_encode($jenis_kelamin);
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
    $halaman = 'data_jenis_kelamin';
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

    return view('showcase.demografi.scjeniskelamin', $data, compact('encodedSku', 'jenis_kelamin', 'halaman', 'visitors', 'data1', 'totalJumlah'));
}
}
