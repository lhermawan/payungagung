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



class IdmController extends Controller
{
    function __construct() {

//        $this->secret_key =env('SECRET_KEY');
       $this->id_desa =env('ID_DESA');
//        $this->p_host= env('P_HOST');
        $this->kd_desa='3207'.env('IDM');
        $this->idm_host= env('IDM_HOST');


    }
    public function index(Request $request)
    {

//        print_r($request->item);die;
//
//        $now = Carbon::now();
        $ptahun=$request->get('ptahun');
        if($ptahun!=''){
            $year=$ptahun;
        }else{
            $year=$request->item;
        }
        $kode_desa=$this->kd_desa;
        $client = new Client(['verify' => false ]);
//        $request = $client->request('GET', 'https://idm.kemendesa.go.id/open/api/desa/rumusan/'.$kode_desa.'/'.$year);
        try {
            $request = $client->request('GET', 'https://idm.kemendesa.go.id/open/api/desa/rumusan/'.$kode_desa.'/'.$year);


        }
        catch(\Exception $e) {
            $error = $e->getResponse();
            $year=$year-1;
            $request = $client->request('GET', 'https://idm.kemendesa.go.id/open/api/desa/rumusan/'.$kode_desa.'/'.$year);
        }
        $response = $request->getBody()->getContents();
        $datamap=json_decode($response);
        $summaries=$datamap->mapData->SUMMARIES;
        $row=$datamap->mapData->ROW;
        $idm_index = [];

        foreach ($row as $data){
            if($data->NO==null){
                array_push($idm_index, [$data]);
            }
        }

        $identitas=$datamap->mapData->IDENTITAS;

        $halaman='showcase.idm';
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


//
//        print_r(json_encode($datamap));die;
        $tahun = idmController::tahun(2020);
//        print_r($tahun);die;


        return view('showcase.idm', compact('halaman','summaries','identitas','row','idm_index','year','tahun', 'visitors'));

    }

    public function tahun(int $awal = 2018, $asc = false)
    {
        $akhir = date('Y');
        $tahun = [];

        for ($i = $akhir; $i >= $awal; $i--) {
            $tahun[] = $i;
        }

        if ($asc) {
            sort($tahun);
        }

        return $tahun;
    }



}
