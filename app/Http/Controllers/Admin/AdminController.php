<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
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


            $news = [
                "reftype" => "%",
                "refid" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/News/ReadAll", $news);
          
            $news = $response->json();


            $trans = [
                "refdate" => now()->toDateString()
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/ReadAll", $trans);
          
            $trans = $response->json();
           
            $pin = [
                "refdate" => now()->toDateString()
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Pin/ReadAll", $pin);
          
            $pin = $response->json();


            if ($data['code'] == 200){
                return view('admin.index', ['users' => $data, 'news' => $news, 'trans' => $trans, 'pins' => $pin]);
            } else {
                return redirect(route('home'));
            }

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
