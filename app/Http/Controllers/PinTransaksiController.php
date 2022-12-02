<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinTransaksi;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class PinTransaksiController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexPin()
    {
        // @dd(now());
        try {
            $data = [
                "refdate" => now(),
                "cabang" => Session::get('cabang'),
                "username" => Session::get('username')
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            //@dd($data['cabang']);
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Pin/ReadAll", $data);
            //$response = Http::withHeaders($headers)->post("http://localhost:5400/api/Pin/ReadAll", $data);
            $data = $response->json();
            // @dd($data);
            // return response()->json($data);
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                return view('admin.pintransaksi.index', ['pintransaksi' => $data]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    ////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView()
    {
        return view('admin.pintransaksi.create', [
            'userid' => $this->getUser("%"),
        ]);
    }

    private function getUser($id)
    {
        $data = [
            'userid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . Session::get('token')
        ])->post(env('APP_URL') . '/api/User/Read', $data);
        return $response->json()['data'];
    }

    ////////////////////////////////////////////////// addViewPin //////////////////////////////////////////////////
    public function addViewPin()
    {
        return view('admin.pintransaksi.create', [
            'userid' => $this->indexPin("%"),
        ]);
    }

    public function storePin(Request $request)
    {
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
                "Authorization" => "Bearer " . Session::get('token')
            ];

            // request
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Pin/Add", $body);

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
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Saldo/Read", $body);
            $data = $response->json();
            $pinrefno = array("refno" => $refno);
            if ($data['code'] == 200) {
                return view('admin.pintransaksi.close', [
                    'pintransaksi' => $data['data'],
                    'pinrefno' => $pinrefno
                ]);
            } else {
                return back()->with('error', 'Belum Ada Transaksi');
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    ////////////////////////////////////////////////// updateView //////////////////////////////////////////////////
    public function updateViewPin($id)
    {
        try {
            $body = [
                "userid" => $id
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Pin/Read", $body);
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
    public function editPin(Request $request)
    {
        $req = $request->all();
        $body = [
            "refdate" => $req['maxtime'],
            "refno" => $req['refno'],
            "userlimit" => $req['userlimit'],
            "maxtime" => $req['maxtime'],
            "cabang" => Session::get('cabang')
        ];

        try {
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Pin/Update", $body);

            // response
            $data = $response->json();
            // @dd($body);
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
    public function destroyPin(Request $request)
    {
        $reg = $request->all();
        try {
            $body = [
                "refno" => (string)$reg['refno']
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post(env('APP_URL') . '/api/Trans/ReadByPin', $body);
            $data = $response->json();

            if ($data['code'] == 200 or $data['code'] == 404) {
                if ($data['code'] == 404) {
                    try {
                        $bodypin = [
                            "refno" => (string)$reg['refno']
                        ];
                        $headerspin = [
                            "Authorization" => "Bearer " . Session::get('token')
                        ];
                        $responsepin = Http::withHeaders($headerspin)->post(env('APP_URL') . "/api/Pin/Close", $bodypin);
                        $datapin = $responsepin->json();
                        // @dd($data['code'],(string)$reg['refno']);
                        if ($datapin['code'] == 200) {
                            return redirect()->route('admin.pintransaksi')->with('success', 'Sukses Close PIN');
                        } else {
                            return back()->with('error', "Gagal Close PIN");
                        }
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                } else {
                    $jumdata = count($data['data']);
                    $index = 0;            
                    foreach ($data['data'] as $row) {
                        try {
                            $index++;
                            $bodycbs = [
                                "transid" => $row['refno'],
                                "norek" => $row['norek'],
                                "nominal" => $row['amount'],
                                "operator" => $row['userid'],
                                "tanggal" => $row['refdate']
                            ];
                            $headerscbs = [
                                // "Authorization" => "Bearer " . Session::get('token')
                                "Content-Type" => "application/json"
                            ];
                            $responsecbs = Http::withHeaders($headerscbs)->post('http://117.53.45.236:8000/api/ecoll/setor_tabungan', $bodycbs);
                            $datacbs = $responsecbs->json();

                            $bodycbs2 = [
                                "jenis" => "1",
                                "nominal" => (int) $row['amount']
                            ];
                            $headerscbs2 = [
                                // "Authorization" => "Bearer " . Session::get('token')
                                "Content-Type" => "application/json"
                            ];
                            $responsecbs2 = Http::withHeaders($headerscbs2)->post('http://117.53.45.236:8000/api/ecoll/pindah_buku', $bodycbs2);
                            $datacbs2 = $responsecbs2->json();
                        } catch (\Throwable $th) {
                            throw $th;
                        }
                        // @dd((integer) $row['amount']);
                        // @dd($datacbs);
                        if ($datacbs['code'] == "00") {
                            try {
                                $bodyrow = [
                                    "refno" => $row['refno'],
                                    "userpin" => $row['pin']
                                ];
                                $headersrow = [
                                    "Authorization" => "Bearer " . Session::get('token')
                                ];
                                $responserow = Http::withHeaders($headersrow)->post(env('APP_URL') . '/api/Trans/Edit', $bodyrow);
                                $datarow = $responserow->json();
                            } catch (\Throwable $th) {
                                // @dd((int) $row['amount']);
                                throw $th;
                            }
                            // @dd($index, $jumdata);
                            if ($datacbs['code'] == "00" && $index >= $jumdata) {
                                // return redirect()->route('admin.pintransaksi')->with("success", "Pin Berhasil Di Close");
                                try {
                                    $bodypin = [
                                        "refno" => (string)$reg['refno']
                                    ];
                                    $headerspin = [
                                        "Authorization" => "Bearer " . Session::get('token')
                                    ];
                                    $responsepin = Http::withHeaders($headerspin)->post(env('APP_URL') . "/api/Pin/Close", $bodypin);
                                    $datapin = $responsepin->json();
                                    if ($datapin['code'] == 200) {
                                        return redirect()->route('admin.pintransaksi')->with('success', 'Sukses Close PIN');
                                    } else {
                                        return back()->with('error', "Gagal Close PIN");
                                    }
                                } catch (\Throwable $th) {
                                    throw $th;
                                }
                            }
                        } else {
                            return back()->with('error', "Posting Transaksi Ke CBS Gagal");
                        }
                    }
                }
            } else {
                return back()->with('error', "Transaksi Gagal");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
