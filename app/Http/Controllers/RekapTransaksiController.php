<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapTransaksi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RekapTransaksiController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexRekapTransaksi()
    {
        $rekap_transaksi = ['code'=>'400'];
                return view('admin.transaksi.rekap_transaksi.index', ['rekap_transaksi' => $rekap_transaksi]);
    }
    ////////////////////////////////////////////////// FILTER //////////////////////////////////////////////////
    public function filterRekap(Request $request)
    {
        try {
        @dd($request);
            $data = [
                // "sdate" => ('created_at',[$start_date,$end_date])->get();
                "sdate" => Carbon::now()->format("Y-m-d"),
                "edate" => Carbon::now()->format("Y-m-d")

            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
        @dd($data);
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/Rekap", $data);
            $data = $response->json();
            if ($data['code'] == 200) {
                return view('admin.transaksi.rekap_transaksi.index');
            } else {
                return view('admin.transaksi.rekap_transaksi.index', ['rekap_transaksi' => $data]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
