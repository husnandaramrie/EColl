<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validasi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ValidasiController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexValidasi()
    {
        try {
            $data = [
                "refdate" => Carbon::now()->format("Y-m-d"),
                "userid" => session::get('userid'),
                "cabang" => Session::get('cabang')
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/ReadValid", $data);
            $data = $response->json();
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                if ($data['code'] == 200) {
                    return view('admin.transaksi.validasi.index', ['validasi' => $data]);
                } else {
                    return view('admin.transaksi.validasi.index', ['validasi' => $data]);
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    ////////////////////////////////////////////////// Destroy //////////////////////////////////////////////////
    public function destroyValidasi($id)
    {
        try {
            // @dd($id);
            $body = [
                "refno" => (string)$id
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/Del", $body);
            $data = $response->json();
            if ($data['code'] == 200) {
                return back()->with('success', 'Data berhasil dihapus');
            } else {
                return back()->with('error', "Data Gagal Dihapus");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
