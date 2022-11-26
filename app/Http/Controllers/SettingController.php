<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexSetting()
    {
        try {
            $data = [
                "id" => "0"
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Setting/Read", $data);
            $data = $response->json();
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                if ($data['code'] == 200) {
                    return view('admin.setting.index', ['setting' => $data]);
                } else {
                    return view('admin.setting.index', ['setting' => $data]);
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    ////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function addView()
    {
        return view('admin.setting.index', [
            'id' => $this->getSetting("%"),
        ]);
    }

    private function getSetting($id)
    {
        $data = [
            'id' => (string)$id
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . Session::get('token')
        ])->post(env('APP_URL') . '/api/Setting/Read', $data);
        return $response->json()['data'];
    }
    ////////////////////////////////////////////////// Add View Setting //////////////////////////////////////////////////

    public function addViewSetting(Request $request)
    {
        // define
        // @dd($request);
        $req = $request->all();
        $body = [
            "id" => 0,
            "Promo" => $req['promo'],
            "Callcenter" => $req['callcenter'],
            "Limitsetor" => $req['limitsetor'],
            "Limittarik" => $req['limittarik'],
            "SMScenter" => $req['smscenter'],
            // "Pintarik" => $req['pintarik'],
            "Pintarik" => $req['pintarik'] == 0 ? false : true,
            "TType" => "U"
        ];
        // @dd($body);
        try {
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // @dd($body);
            // request
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Setting/Set", $body);

            // response
            $data = $response->json();

            // $column = $request->input('column', 'name');
            if ($data['code'] == 200) {
                return redirect()->route('admin.setting')->with("success", $data['status']);
            } else {
                return back()->with('error', $data['message']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
