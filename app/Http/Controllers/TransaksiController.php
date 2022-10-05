<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
    	$transaksi = Transaksi::with(['user'])->latest()->paginate(4);
    	return view('transaksi.index',compact('transaksi'));
    }

    public function show(Transaksi $transaksi)
    {
    	return view('transaksi.show',compact('transaksi'));
    }
}
