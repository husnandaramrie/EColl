<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserControllerNew extends Controller
{
////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function index()
    {
        try {
            $data = [
                "userId" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Read", $data);
          
            $data = $response->json();

            if($data['code'] == 401){
                return redirect(route('login'));                   
            } else {
                return view('admin.users.index', ['users' => $data]); 
            }
            
        } catch (\Throwable $th) {
            return $th;
        }
    }

////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView() {
        return view('admin.users.create', [
         'levels' => $this->getLevels("%"),
         'clusters' => $this->getCluster("%"),
         'branches' => $this->getCabang("%"),
         'clients' => $this->getClient("%"),
         'relations' => $this->getRelationMbs("%")
        ]);
    }

////////////////////////////////////////////////// storeUser //////////////////////////////////////////////////
    public function storeUser(Request $request) {
        // define
        $req = $request->all();
        $body = [
                "userId" => $req['username'],
                "userPwd" => $req['password'],
                "userName" => $req['nama_user'],
                "KodeKolect" => "",
                "AddUsr" => $req['add_user'] == 0 ? false : true,
                "level" => $req['levels'],
                "pVwRpt" => $req['view_report'] == 0 ? false : true,
                "pVwTrx" => (int)$req['view_trx'] == 1 ? true : false,
                "pTrxStr" => $request->has('setoran') ? $req['setoran'] == "on" ? true : false : false,
                "pTrxTrk" => $request->has('penarikan') ? $req['penarikan'] == "on" ? true : false : false,
                "pTrxAgs" => $request->has('angsuran_kredit') ? $req['angsuran_kredit'] == "on" ? true : false : false,
                "pVwOts" => (int)$req['otorisasi'] == 1 ? true : false,
                "pLmtOts" => (int)$req['limit_otorisasi'],
                "cabang" => $req['cabang'],
                "cluster" => $req['cluster'],
                "client" => $req['client'],
                "createby" => Session::get('username'),
                "corebankid" => $req['relasi_mbs_online'],
                "email" => $req['email']
        ];

       try {
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];

        // request
        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Add", $body);

        // response
        $data = $response->json();
        if ($data['code'] == 200) {
            return redirect()->route('admin.users')->with("success", $data['message']);
        } else {
            return back()->with('error', $data['message']);
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }

////////////////////////////////////////////////// updateView //////////////////////////////////////////////////
    public function updateView($id) {
        $data = [
            "userId" => (string)$id
        ];
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];
        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Read", $data);
        $data = $response->json()['data'];

        return view('admin.users.edit', [
            'data' => $data,
            'levels' => $this->getLevels("%"),
            'clusters' => $this->getCluster("%"),
            'branches' => $this->getCabang("%"),
            'clients' => $this->getClient("%"),
            'relations' => $this->getRelationMbs("%")
        ]);
    }

////////////////////////////////////////////////// edit //////////////////////////////////////////////////
    public function edit(Request $request) {
        $req = $request->all();
        // return response()->json($req);
        // return redirect()->route('admin.users')->with("success", $req);

        $body = [
                "UserId" => $req['username'],
                "UserPwd" => $req['password'],
                "UserName" => $req['nama_user'],
                "KodeKolect" => "",
                "AddUsr" => $req['add_user'] == 0 ? false : true,
                "Level" => $req['levels'],
                "PVwRpt" => $req['view_report'] == 0 ? false : true,
                "PVwTrx" => (int)$req['view_trx'] == 1 ? true : false,
                "PTrxStr" => $request->has('setoran') ? $req['setoran'] == "on" ? true : false : false,
                "PTrxTrk" => $request->has('penarikan') ? $req['penarikan'] == "on" ? true : false : false,
                "PTrxAgs" => $request->has('angsuran_kredit') ? $req['angsuran_kredit'] == "on" ? true : false : false,
                "PVwOts" => (int)$req['otorisasi'] == 1 ? true : false,
                "PLmtOts" => (int)$req['limit_otorisasi'],
                "UserSaldo " => 0,
                "Cabang" => $req['cabang'],
                "Cluster" => $req['cluster'],
                "Client" => $req['client'],
                "CreateBy" => Session::get('username'),
                "CoreBankID" => $req['relasi_mbs_online'],
                "Email" => $req['email']
            ];
        // return response()->json($body);
        // return redirect()->route('admin.users')->with("success", $);

       try {
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];
        // request
       // return redirect()->route('admin.users')->with("success", $body['cabang']);
        $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Edit", $body);

        // response
        $data = $response->json();
        if ($data['code'] == 200) {
            return redirect()->route('admin.users')->with("success", $data['message']);
        } else {
            return back()->with('error', $data['message']);
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }

////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
    public function destroy($id) {
        try {
            $body = [
                "userId" => (string)$id
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Del", $body);
            $data = $response->json();
            // return $data;
            if ($data['code'] == 200) {
                return back()->with('success', 'Data berhasil dihapus');
            } else {
                return back()->with('error', "Data Gagal Dihapus");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

////////////////////////////////////////////////// getLevels ////////////////////////////////////////////////////////
    private function getLevels($id) {
        $data = [
            'levelid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Level', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// getCluster ////////////////////////////////////////////////////////
    private function getCluster($id) {
        $data = [
            'clusterid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Cluster', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// getClient ////////////////////////////////////////////////////////
    private function getClient($id) {
        $data = [
            'clientid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Client', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// getCabang ////////////////////////////////////////////////////////
    private function getCabang($id) {
        $data = [
            'divisiid' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/Divisi', $data);
        return $response->json()['data'];
    }

////////////////////////////////////////////////// getRelationMbs ////////////////////////////////////////////////////////
    private function getRelationMbs($id) {
        $data = [
            "userid" => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".Session::get('token')
        ])->post('http://117.53.45.236:8002/api/User/UserCBS', $data);
        return $response->json()['data'];
    }
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
