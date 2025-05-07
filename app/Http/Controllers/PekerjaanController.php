<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;
use GuzzleHttp\Client;
use App\Models\Visitors;
use App\Traits\PaginationTraits;

class PekerjaanController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();

    //     if ($user->level == 'Admin') {
    //         $penduduk = Penduduk::orderBy('nik', 'asc')->get();
    //     } else {
    //         $penduduk = Penduduk::where('dusun', $user->level)->orderBy('nik', 'asc')->get();
    //     }

    //     $pekerjaanList = Pekerjaan::orderBy('nama', 'asc')->get();

    //     $pekerjaanData = [];

    //     foreach ($pekerjaanList as $pekerjaan) {
    //         $total = $penduduk->where('pekerjaan', $pekerjaan->nama)->count();
    //         $laki_laki = $penduduk->where('pekerjaan', $pekerjaan->nama)->where('jenis_kelamin', 'Laki-laki')->count();
    //         $perempuan = $penduduk->where('pekerjaan', $pekerjaan->nama)->where('jenis_kelamin', 'Perempuan')->count();

    //         $jumlahPercent = $total ? ($total / $penduduk->count()) * 100 : 0;
    //         $lakiLakiPercent = $total ? ($laki_laki / $total) * 100 : 0;
    //         $perempuanPercent = $total ? ($perempuan / $total) * 100 : 0;

    //         $pekerjaanData[] = [
    //             'pekerjaan' => $pekerjaan->nama,
    //             'jumlah_n' => $total,
    //             'jumlah_percent' => number_format($jumlahPercent, 2),
    //             'laki_laki_n' => $laki_laki,
    //             'laki_laki_percent' => number_format($lakiLakiPercent, 2),
    //             'perempuan_n' => $perempuan,
    //             'perempuan_percent' => number_format($perempuanPercent, 2),
    //         ];
    //     }

    //     $total_jumlah_n = array_sum(array_column($pekerjaanData, 'jumlah_n'));
    //     $total_jumlah_percent = $total_jumlah_n ? number_format(($total_jumlah_n / $penduduk->count()) * 100, 2) : 0;
    //     $total_laki_laki_n = array_sum(array_column($pekerjaanData, 'laki_laki_n'));
    //     $total_laki_laki_percent = $total_jumlah_n ? number_format(($total_laki_laki_n / $total_jumlah_n) * 100, 2) : 0;
    //     $total_perempuan_n = array_sum(array_column($pekerjaanData, 'perempuan_n'));
    //     $total_perempuan_percent = $total_jumlah_n ? number_format(($total_perempuan_n / $total_jumlah_n) * 100, 2) : 0;

    //     return view('demografi.pekerjaan.pekerjaan', [
    //         'penduduk' => $penduduk,
    //         'pekerjaanData' => $pekerjaanData,
    //         'total_jumlah_n' => $total_jumlah_n,
    //         'total_jumlah_percent' => $total_jumlah_percent,
    //         'total_laki_laki_n' => $total_laki_laki_n,
    //         'total_laki_laki_percent' => $total_laki_laki_percent,
    //         'total_perempuan_n' => $total_perempuan_n,
    //         'total_perempuan_percent' => $total_perempuan_percent,
    //     ]);
    // }

    use PaginationTraits;

    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');




    }
    public function index(Request $request)
    {

        $url='/summary/pekerjaan?secret_key='.$this->secret_key.'&kode_desa='.$this->kd_desa;
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

        $data['s_pekerjaan'] = json_decode($a);
        //  dd($data['s_pekerjaan']);
        $pekerjaan=$data['s_pekerjaan'];
        $encodedSku = json_encode($pekerjaan);

        foreach($pekerjaan as $row) {
            $data['label'] = $row->name;
            $data['jumlah'] = $row->y;
          }
        $encodedLabel = json_encode($pekerjaan);

        $arry = collect(json_decode($encodedLabel));
        $data1 = $this->paginate($arry);
        $data1->withPath('');
        // dd($data1);
        $data['chart_data'] = json_encode($data);
        $halaman = 'data_pekerjaan';
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
        return view('demografi.pekerjaan.pekerjaan',$data, compact('encodedSku','pekerjaan','halaman', 'visitors', 'data1'));
    }
}
