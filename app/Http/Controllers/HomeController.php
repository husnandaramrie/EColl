<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index',[
            // 'agenda' => Agenda::latest()->take(2)->get(),
            // 'artikel' => Artikel::with(['user','kategoriArtikel'])->latest()->take(2)->get(),
            // 'pengumuman' => Pengumuman::with(['user'])->latest()->take(2)->get(),
        ]);
    }

    public function about()
    {
    	return view('home.about');
    }

    public function contact()
    {
    	return view('home.contact');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
