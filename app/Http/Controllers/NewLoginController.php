<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NewLoginController extends Controller
{
    public function login(Request $req) {
        $input = $req->all();
        $data = [
            'userName' => $input['username'],
            'password' => $input['password']
        ];
        $res = Http::post("http://117.53.45.236:8002/api/Login/Authorize", $data);
        //$res = Http::post("http://localhost:5400/api/Login/Authorize", $data);
        $response = $res->json();
        if ($response['code'] == 200) {
            Session::put('token', $response['data'][0]['Token']);
            Session::put('username', $input['username']);

            $datalog = [
                'userid' => $input['username']
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            $reslog = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/User/Read", $datalog);
            //$reslog = Http::withHeaders($headers)->post("http://localhost:5400/api/User/Read", $datalog);
            $responselog = $reslog->json();
            //@dd($responselog);
            if ($responselog['code'] == 200){
                Session::put('AddUser', $responselog['data'][0]['adduser']);
                if ($responselog['data'][0]['level'] == "CLT"){
                    $value = "%";
                    Session::put('cabang', $value);
                } else {
                    Session::put('cabang', $responselog['data'][0]['cabang']);
                }
            }
            //@dd($responselog);

            return redirect()->route('admin.index');
        } else {
            return back()->with('error', 'Username / Password Salah');
        }
    }
}
