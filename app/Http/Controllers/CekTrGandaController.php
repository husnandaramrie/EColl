<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CekTrGandaController extends Controller
{
////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexCekTransGan() {
        {

            // return view('admin.transaksi.data_transaksi.index');
        try {
            $data = [
                "refdate" => Carbon::now()->format("Y-m-d")
            ];
            $headers = [
                "Authorization" => "Bearer ".Session::get('token')
            ];
        // @dd($data);
            $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/ReadAll", $data);
            $data = $response->json();
                if ($data['code'] == 200) {
                    $data = $response->json()['data'];
                    return view('admin.transaksi.cek_tr_ganda.index', ['cek_tr_ganda' => $data]);
                } else {
                    return view('admin.transaksi.cek_tr_ganda.index', ['cek_tr_ganda' => '00']);
                }
            } catch (\Throwable $th) {
                return $th;
            }
        }
    ////////////////////////////////////////////////// destroy ////////////////////////////////////////////////////////
        // public function destroyDataTrans($id) {
        //     try {
        //                 // @dd($id);
        //         $body = [
        //             "refid" => $id
        //         ];
        //         $headers = [
        //             "Authorization" => "Bearer ".Session::get('token')
        //         ];
        //         // request
        //         $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/Trans/Del", $body);
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
    }
}