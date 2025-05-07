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

class SCPendidikanController extends Controller
{

    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');




    }
    public function index(Request $request)
    {

        $url='/summary/pendidikan?secret_key='.$this->secret_key.'&kode_desa='.$this->kd_desa;
        $host=$this->p_host.$url;
        $client = new Client(['verify' => false ]);
        try {
            $request = $client->request('GET', $host);
        }
        catch(\Exception $e) {
            $error = $e->getResponse();
            $request = $client->request('GET', $host);
        }
        $a = $request->getBody()->getContents();

        $data['s_pendidikan'] = json_decode($a);
        //  dd($data['s_pendidikan']);
        $pendidikan=$data['s_pendidikan'];
        $encodedSku = json_encode($pendidikan);

        foreach($pendidikan as $row) {
            $data['label'] = $row->name;
            $data['jumlah'] = $row->y;
          }
        $encodedLabel = json_encode($pendidikan);

        $arry = collect(json_decode($encodedLabel));

$currentPage = LengthAwarePaginator::resolveCurrentPage();
$perPage = 10; // jumlah data per halaman

$currentItems = $arry->slice(($currentPage - 1) * $perPage, $perPage)->values();

$data1 = new LengthAwarePaginator(
    $currentItems,
    $arry->count(),
    $perPage,
    $currentPage,
    ['path' => request()->url(), 'query' => request()->query()]
);
        // dd($data1);
        $data['chart_data'] = json_encode($data);
        $halaman = 'data_pendidikan';
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
        return view('showcase.demografi.scpendidikan',$data, compact('encodedSku','pendidikan','halaman', 'visitors', 'data1'));
    }
}
