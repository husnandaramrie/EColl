<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BoardController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexBoard()
    {

        try {
            $data = [
                "reftype" => "%",
                "refid" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/ReadAll", $data);
            // $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Read", $data);
            $data = $response->json();
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                if ($data['code'] == 200) {
                    return view('admin.board.index', ['board' => $data]);
                } else {
                    return view('admin.board.index', ['board' => $data]);
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    ////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView()
    {
        return view('admin.board.create', [
            'refid' => $this->getRefID("1")
        ]);
        // @dd('bayu');
        // return view('admin.board.create');
    }

    private function getRefID($id)
    {
        $data = [
            'refid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . Session::get('token')
        ])->post('http://117.53.45.236:8002/api/News/Read', $data);
        $data = $response->json();
        if ($data['code'] == 200) {
            return $data['data'];
        } else {
            return [];
        }
        // return $response->json()['data'];
    }

    ////////////////////////////////////////////////// addViewPin //////////////////////////////////////////////////
    public function addViewBoard()
    {
        return view('admin.board.create', [
            'refid' => $this->getRefID("1"),
        ]);
    }

    public function storeBoard(Request $request)
    {
        // define
        // @dd($request);
        $req = $request->all();
        $body = [
            "refdate" => Carbon::now()->format("Y-m-d"),
            "reftype" => $req['reftype'],
            "content" => $req['content'],
            "expdate" => $req['expdate'],
            "status" => $req['status'] == 0 ? false : true,
            "picture" => ""
        ];
        // @dd($body);
        try {
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // @dd($body);
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Add", $body);

            // response
            $data = $response->json();

            // $column = $request->input('column', 'name');
            if ($data['code'] == 200) {
                return redirect()->route('admin.board')->with("success", $data['status']);
            } else {
                return back()->with('error', $data['message']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    ////////////////////////////////////////////////// updateView //////////////////////////////////////////////////
    public function updateViewBoard($id)
    {
        try {
            $body = [
                "reftype" => "%",
                "refid" => $id
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/ReadAll", $body);
            $data = $response->json();
            if ($data['code'] == 200) {
                //@dd($data);
                return view('admin.board.edit', ['data' => $data['data']]);
            } else {
                return back()->with('error', "Data Tidak Ada");
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    // ////////////////////////////////////////////////// edit //////////////////////////////////////////////////
    public function edit(Request $request)
    {

        $req = $request->all();

        $body = [
            "refid" => $req['refid'],
            "refdate" => $req['refdate'],
            "reftype" => $req['reftype'],
            "expdate" => $req['expdate'],
            "content" => $req['news'],
            "status" => $req['status'] == 0 ? false : true,
            "picture" => "",
            "ttype" => "U"
        ];
        //@dd($body);
        try {
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Edit", $body);
            $data = $response->json();
            if ($data['code'] == 200) {
                return redirect()->route('admin.board')->with("success", "Data Berhasil Di Update");
            } else {
                return back()->with('error', "Update Gagal");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    ////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
    public function destroyBoard($id)
    {
        try {
            $body = [
                "refid" => $id
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/Del", $body);
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
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
