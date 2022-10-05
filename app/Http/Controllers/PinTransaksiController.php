<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinTransaksi;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PinTransaksiController extends Controller
{
////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexPin()
    {
        try {
            $data = [
                "refdate" => now()
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/ReadAll", $data);
            $data = $response->json();
            // @dd($data);
                    // return response()->json($data);

            return view('admin.pintransaksi.index', ['pintransaksi' => $data]);
        } catch (\Throwable $th) {
            return $th;
        }
    }

////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView() {
        return view('admin.pintransaksi.create', [
        'userid' => $this->getUser("%"),
        ]);
    }

    private function getUser($id) {
        $data = [
            'userid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Read', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// addViewPin //////////////////////////////////////////////////
    public function addViewPin() {
        return view('admin.pintransaksi.create', [
        'userid' => $this->indexPin("%"),
        ]);
    }

    public function storePin(Request $request) {
        // define
        $req = $request->all();
        $body = [
                "userid" => $req['userid'],
                "userlimit" => $req['userlimit'],
                "maxtime" => $req['maxtime'],
                "saldoawal" => $req['saldoawal'],
                "saldoakhir" => 0
        ];

       try {
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];

        // request
        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/Add", $body);

        // response
        $data = $response->json();
        if ($data['code'] == 200) {
            return redirect()->route('admin.pintransaksi')->with("success", $data['message']);
        } else {
            return back()->with('error', $data['message']);
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }


    public function closeviewPin($id, $refno)
    {
        // @dd($id, $refno);
        try {
            $body = [
                "norek" => $id,
                "ttype" => 'EC'
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Saldo/Read", $body);
            $data = $response->json();
            $pinrefno = array("refno" => $refno);
            if ($data['code'] == 200){
                return view('admin.pintransaksi.close', [
                    'pintransaksi' => $data['data'],
                    'pinrefno' => $pinrefno
                ]);
            } else {
                return back()->with('error','Data Tidak Ada');
            }
        } catch (\Exception $th){
            throw $th;
        }
    }

////////////////////////////////////////////////// updateView //////////////////////////////////////////////////
    public function updateViewPin($id) {
        try {
            $body = [
                "userid" => $id
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/Read", $body);
            $data = $response->json();
            // return response()->json($data);
            // return $data;
            if ($data['code'] == 200) {
                return view('admin.pintransaksi.edit', [
                    'pintransaksi' => $data['data']
                ]);
              
            } else {
                return back()->with('error', "Data Gagal Ditambah");
            }
        } catch (\Exception $th) {
            throw $th;
        }
    } 

////////////////////////////////////////////////// edit //////////////////////////////////////////////////
    public function editPin(Request $request) {
        $req = $request->all();
        $body = [
                "refdate" => $req['maxtime'],
                "refno" => $req['refno'],
                "userlimit" => $req['userlimit'],
                "maxtime" => $req['maxtime']
        ];

        try {
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/Update", $body);

            // response
            $data = $response->json();
            if ($data['code'] == 200) {
                return redirect()->route('admin.pintransaksi')->with("success", "Data Berhasil Di Update");
            } else {
                return back()->with('error', "Update Gagal");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
    public function destroyPin(Request $request) {
        $reg = $request->all();
        try {
            $body = [
                "refno" => (string)$reg['refno']
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/Close", $body);
            $data = $response->json();
            // return $data;
            if ($data['code'] == 200) {
                return redirect()->route('admin.pintransaksi')->with('success', 'Sukses Close PIN');
            } else {
                return back()->with('error', "Gagal Close PIN");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}