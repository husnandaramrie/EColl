<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NewLoginController extends Controller
{
    //
    public function login(Request $req) {
        $input = $req->all();
        $data = [
            'userName' => $input['username'],
            'password' => $input['password']
        ];
        $res = Http::post("http://117.53.45.236:8002/api/Login/Authorize", $data);
        $response = $res->json();
        if ($response['code'] == 200) {
            Session::put('token', $response['data'][0]['Token']);
            Session::put('username', $input['username']);
            return redirect()->route('admin.index');
        } else {
            return back()->with('error', 'Username / Password Salah');
        }
    }
}
