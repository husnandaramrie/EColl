<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QRNasabah;

class QRNasabahController extends Controller
{
    public function index()
    {
    	$qrnasabah = QRNasabah::with(['user'])->latest()->paginate(4);
    	return view('qrnasabah.index',compact('qrnasabah'));
    }

    public function show(QRNasabah $qrnasabah)
    {
    	return view('qrnasabah.show',compact('qrnasabah'));
    }
}
