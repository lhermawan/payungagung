<?php

namespace App\Http\Controllers\showcase\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{VisiMisi};
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;
use App\Models\Header;
use App\Models\Visitors;
use Illuminate\Support\Facades\Http;

class VisiMisiController extends Controller
{
    function __construct() {
        $this->api_key =env('API_KEY');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
    }

    public function index(Request $request)
    {

        $data1 = $request->session()->all();
        // dd($data1);
//        $client = new GuzzleClient([
//            'C-KEY' => $this->api_key
//        ]);
        $url='/api/ciamis/visimisidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);

        $a = json_decode($response->body(), true);
        // dd($a);
//        $data1=
        $data['visi'] =$a['data']['visi'];
        $data['misi'] = $a['data']['misi'];
        $data['halaman'] ='visi_misi';
//        print_r($data['misi']);die;
//        foreach ($data['misi'] as $value) {
//            print_r($value) ."<br>";
//        }die;
$header = Header::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->limit(1)->get();
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

return view('showcase.profile.visi-misi',$data, compact('visitors', 'header'));
}

}
