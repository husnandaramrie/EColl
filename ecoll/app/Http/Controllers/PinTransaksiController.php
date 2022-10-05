<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PinTransaksi;

class PinTransaksiController extends Controller
{
    public function index()
    {
    	$pintransaksi = PinTransaksi::with(['user'])->latest()->paginate(4);
    	return view('pintransaksi.index',compact('pintransaksi'));
    }

    public function show(PinTransaksi $pintransaksi)
    {
    	return view('pintransaksi.show',compact('pintransaksi'));
    }
}
