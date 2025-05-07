<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Visitors;
use App\Traits\PaginationTraits;

class PendidikanController extends Controller
{
    use PaginationTraits;

    public function __construct()
    {
        $this->secret_key = env('SECRET_KEY');
        $this->id_desa = env('ID_DESA');
        $this->p_host = env('P_HOST');
        $this->kd_desa = env('K_P_DESA');
    }

    public function index(Request $request)
    {
        $url = '/summary/pendidikan?secret_key=' . $this->secret_key . '&kode_desa=' . $this->kd_desa;
        $host = $this->p_host . $url;

        $client = new Client(['verify' => false]);

        try {
            $response = $client->request('GET', $host);
        } catch (\Exception $e) {
            $response = $client->request('GET', $host); // fallback (opsional)
        }

        $body = $response->getBody()->getContents();
        $pendidikan = json_decode($body);

        $encodedSku = json_encode($pendidikan);
        $data['s_pendidikan'] = $pendidikan;

        $collection = collect($pendidikan);
        $data1 = $this->paginate($collection);
        $data1->withPath('');

        $halaman = 'data_pendidikan';

        $visitors = Visitors::firstOrCreate(
            ['id_desa_skpd' => $this->id_desa],
            ['jumlah' => 0]
        );

        if (session('session') !== true) {
            session(['session' => true]);
            $visitors->increment('jumlah');
        }

        return view('demografi.pendidikan.pendidikan', $data, compact('encodedSku', 'pendidikan', 'halaman', 'visitors', 'data1'));
    }
}
