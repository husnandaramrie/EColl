<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\Agenda;
// use App\Models\Artikel;
// use App\Models\Pengumuman;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "userId" => "%"
        ];
        $headers = [
            "Authorization" => "Bearer ".Session::get('token')
        ];

        
        $response = Http::withHeaders($headers)->post(env('APP_URL') . "/api/User/Read", $data);
      
        $data = $response->json();
    
        if ($data['code'] == 401)
        {
            return redirect(route('login'));
        } else {
            return view('home.index');
        }
    	// return view('home.index',[
        //     'agenda' => Agenda::latest()->take(2)->get(),
        //     'artikel' => Artikel::with(['user','kategoriArtikel'])->latest()->take(2)->get(),
        //     'pengumuman' => Pengumuman::with(['user'])->latest()->take(2)->get(),
        // ]);
        // return view('home.index');
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
