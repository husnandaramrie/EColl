<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexDashboard()
    {
       
        try {
            $data = [
                "numRow" => 1
                // "reftype" => "ALL",
                // "refid" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            // $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/ReadAll", $data);
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Read", $data);
            $data = $response->json();
            if ($data['code'] == 200) {
                $data = $response->json()['data'];
                return view('admin.dashboard.index', ['dashboard' => $data]);
            } else {
                return view('admin.dashboard.index', ['dashboard' => []]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function indexDashboard2()
    {
        // @dd('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
    
    }

////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView0() {
        // return view('admin.dashboard.create', [
        // // 'refid' => $this->getRefID("1")
        // ]);
        @dd('bayu');
        return view('admin.dashboard.create');
    }

    private function getDashboard($id) {
        $data = [
            'refid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/News/Read', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// addViewPin //////////////////////////////////////////////////
    public function addViewDashboard() {
    return view('admin.dashboard.create', [
        'refid' => $this->indexDashboard("1"),
        ]);
    }
    
    public function storeDashboard(Request $request) {
        // define
        // @dd($request);
        $req = $request->all();
        $body = [
                "refid" => $req['refid'],
                "refdate" => $req['refdate'],
                "reftype" => $req['reftype'],
                "expdate" => $req['expdate'],
                "news" => $req['news'],
                "status" => $req['status'] == 0 ? false : true
                // "picture" => $req['picture']
        ];
    // @dd($body);
    try {
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];
        // @dd($body);
        // request
        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Add", $body);

        // response
        $data = $response->json();
    
        // $column = $request->input('column', 'name');
        if ($data['code'] == 200) {
            return redirect()->route('admin.dashboard')->with("success", $data['status']);
        } else {
            return back()->with('error', $data['message']);
        }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

////////////////////////////////////////////////// updateView //////////////////////////////////////////////////
    // public function updateViewDashboard($id) {
    //     try {
    //         $body = [
    //             "numRow" => 1
    //         ];
    //         $headers = [
    //             "Authorization" => "Bearer ".Session::get('token')
    //         ];
    //         // request
    //         $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/dashboard/Read", $body);
    //         $data = $response->json();
    //         // return $data;
    //         if ($data['code'] == 200) {
    //             return back()->with('success', 'Data berhasil Ditambah');
    //         } else {
    //             return back()->with('error', "Data Gagal Ditambah");
    //         }
    //     } catch (\Exception $th) {
    //         throw $th;
    //     }
    // } 

// ////////////////////////////////////////////////// edit //////////////////////////////////////////////////
    // public function editDashboard(Request $request) {
    //     $req = $request->all();
    //     $body = [
    //             "refID" => $req['refID'],
    //             "refDate" => $req['refDate'],
    //             "refType" => $req['refType'],
    //             "expDate" => $req['expDate'],
    //             "content" => $req['content'],
    //             "status" => $req['status'],
    //             // "picture" => $req['picture'],
    //             "ttype" => $req['ttype']
    //     ];

    //     try {
    //         $headers = [
    //             "Authorization" => "Bearer ".Session::get('token')
    //         ];
    //         // request
    //         $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Edit", $body);

    //         // response
    //         $data = $response->json();
    //         if ($data['code'] == 200) {
    //             return redirect()->route('admin.dashboard')->with("success", $data['message']);
    //         } else {
    //             return back()->with('error', $data['message']);
    //         }
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
    // public function destroyDashboard($id) {
    //     try {
    //         $body = [
    //             "refId" => "3"
    //         ];
    //         $headers = [
    //             "Authorization" => "Bearer ".Session::get('token')
    //         ];
    //         // request
    //         $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Del", $body);
    //         $data = $response->json();
    //         // return $data;
    //         if ($data['code'] == 200) {
    //             return back()->with('success', 'Data berhasil dihapus');
    //         } else {
    //             return back()->with('error', "Data Gagal Dihapus");
    //         }
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}