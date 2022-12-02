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
            
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/User/Read", $data);
          
            $data = $response->json();


            $news = [
                "reftype" => "%",
                "refid" => "%"
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
            
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/News/ReadAll", $news);
          
            $news = $response->json();

            // @dd(Session::get('userid'));
            // @dd(Session::get('cabang'));
            $trans = [
                "refdate" => now()->toDateString(),
                "userid" => Session::get('userid'),
                "cabang" => Session::get('cabang')
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Trans/v2/ReadAll", $trans);
          
            $trans = $response->json();
           
            $pin = [
                "refdate" => now()->toDateString(),
                "cabang" => Session::get('cabang'),
                "username" => Session::get('username')
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Pin/ReadAll", $pin);
            //@dd($pin['cabang']);
          
            $pin = $response->json();

            $valid = [
                "refdate" => now()->toDateString(),
                "userid" => Session::get('userid'),
                "cabang" => Session::get('cabang')
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];

            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Trans/ReadValid", $valid);
          
            $valid = $response->json();


            if ($data['code'] == 200){
               return view('admin.index', ['users' => $data, 'news' => $news, 'trans' => $trans, 'pins' => $pin, 'valids' => $valid]);
            } else {
               return redirect(route('home'));
            }

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
