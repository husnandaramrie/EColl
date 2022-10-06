<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class QRNasabahTabController extends Controller
{
    public function indexTabungan()
    {
        try {
            $data = [
                "ttype" => "T",
                "norek" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/ReadBC", $data);
            //$response = Http::withHeaders($headers)->post("http://localhost:5400/api/User/ReadBC", $data);

            $data = $response->json();
            // @dd($data);
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                $status = array("code" => "new");

                return view('admin.qr-nasabah.tabungan.index', ['barcodes' => $data, 'status' => $status]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function cariTabungan(Request $request)
    {
        $input = $request->all();
        try {
            if ($input['norek'] == "") {
                $cari = "%";
                $status = array("code" => "new");
            } else {
                $cari = $input['norek'];
                $status = array("code" => "old");
            };

            $data = [
                "ttype" => "T",
                "norek" => $cari
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/ReadBC", $data);
            //$response = Http::withHeaders($headers)->post("http://localhost:5400/api/User/ReadBC", $data);

            $data = $response->json();
            // @dd($data);

            if ($input['tags'] == "views") {
                return view('admin.qr-nasabah.tabungan.index', ['barcodes' => $data, 'status' => $status]);
            }

            if ($input['tags'] == "prints") {
                return view('admin.qr-nasabah.tabungan.print', ['barcodes' => $data]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function cetakTabungan(Request $request)
    {
        $input = $request->all();
        try {
            $data = [
                "ttype" => "T",
                "norek" => $input['norek']
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/ReadBC", $data);
            //$response = Http::withHeaders($headers)->post("http://localhost:5400/api/User/ReadBC", $data);

            $data = $response->json();
            // @dd($data);

            return view('admin.qr-nasabah.tabungan.print', ['barcodes' => $data]);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
