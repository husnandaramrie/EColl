<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTransaksi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Session\SessionServiceProvider;

class DataTransaksiController extends Controller
{
    ////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexDataTransaksi()
    {
        try {
            $data = [
                "refdate" => Carbon::now()->format("Y-m-d"),
                "userid" => Session::get('userid'),
                "cabang" => Session::get('cabang')
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // @dd($data);
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Trans/v2/ReadAll", $data);
            $data = $response->json();
            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                if ($data['code'] == 200) {
                    return view('admin.transaksi.data_transaksi.index', ['data_transaksi' => $data]);
                } else {
                    return view('admin.transaksi.data_transaksi.index', ['data_transaksi' => $data]);
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function printTransaksi(Request $request)
    {
        $input = $request->all();
        try{
            $data = [
                "refdate" => Carbon::now()->format("Y-m-d"),
                "userid" => $input['userid'],
                "cabang" => Session::get('cabang')
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // @dd($data);
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Trans/v2/ReadAll", $data);
            $data = $response->json();
            $data2 = [
                "userid" => $input['userid']
            ];
            $headers2 =  [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response2 = Http::withHeaders($headers2)->post(env('APP_URL') . "/api/User/Read", $data2);
            $data2 = $response2->json();
            $data3 = [
                "userid" => $input['userid']
            ];
            $headers3 =  [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            $response3 = Http::withHeaders($headers3)->post(env('APP_URL') . "/api/Pin/Read", $data3);
            $data3 = $response3->json();            
            // @dd($data3);

            if ($data['code'] == 401) {
                return redirect(route('login'));
            } else {
                if ($data['code'] == 200) {
                    return view('admin.transaksi.data_transaksi.print', ['data_transaksi' => $data, "data_user" => $data2, "data_saldo" => $data3]);
                } else {
                    return view('admin.transaksi.data_transaksi.print', ['data_transaksi' => $data, "data_user" => $data2, "data_saldo" => $data3]);
                }
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    ////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
    public function destroyDataTrans($id)
    {
        try {
            // @dd($id);
            $body = [
                "refno" => (string)$id
            ];
            $headers = [
                "Authorization" => "Bearer " . Session::get('token')
            ];
            // request
            $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/Trans/Del", $body);
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
}
