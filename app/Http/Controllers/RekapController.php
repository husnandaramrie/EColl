<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapTransaksi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class RekapController extends Controller

{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexRekap(Request $request)
    {
        // $rekap = ['code'=>'400'];
        //@dd($this->getCabang("%"));
        $data = [
            "userId" => "%"
        ];
        $headers = [
            "Authorization" => "Bearer " . Session::get('token')
        ];


        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Read", $data);

        $data = $response->json();

        if ($data['code'] == 401) {
            return redirect(route('login'));
        } else {
            $rekap = array("code" => "404");
            return view('admin.transaksi.rekap_transaksi.index', [
                'branches' => $this->getCabang("%"),
                'clients' => $this->getClient("%"),
                'rekap' => $rekap
            ]);
        }
    }
    ////////////////////////////////////////////////// FILTER //////////////////////////////////////////////////
    public function readRekap(Request $request)
    {
        try {
            $reg = $request->all();
            //@dd($reg);
            $body = [
                // "sdate" => ('created_at',[$start_date,$end_date])->get();
                "sdate" => $reg['sdate'], //Carbon::now()->format("Y-m-d"),
                "edate" => $reg['edate'] //Carbon::now()->format("Y-m-d")

            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];

            //@dd($data);

            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/Rekap", $body);
            $data = $response->json();
            //@dd($data);
            if ($data['code'] == 200) {
                return view('admin.transaksi.rekap_transaksi.index', ['rekap' => $data, 'clients' => $this->getClient("%"), 'branches' => $this->getCabang("%")]);
            } else {
                return view('admin.transaksi.rekap_transaksi.index', ['rekap' => $data, 'clients' => $this->getClient("%"), 'branches' => $this->getCabang("%")]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    ////////////////////////////////////////////////// getCabang ////////////////////////////////////////////////////////
    private function getCabang($id)
    {
        $data = [
            'divisiid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Divisi', $data);
        return $response->json()['data'];
    }

    ////////////////////////////////////////////////// getClient ////////////////////////////////////////////////////////
    private function getClient($id)
    {
        $data = [
            'clientid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Client', $data);
        return $response->json()['data'];
    }
}
