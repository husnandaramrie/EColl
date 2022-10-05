<?php

namespace App\Http\Controllers;
// namespace App\Models;

use App\Models\TrackingUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TrackingUserController extends Controller
{
////////////////////////////////////////////////// INDEX //////////////////////////////////////////////////
    public function indexTrackingUser(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */
        //$ip = '162.159.24.227'; /* Static IP address */
        //$currentUserInfo = Location::get($ip);
        
        //return view('admin.tracking-user.index', compact('currentUserInfo'));
         return view('admin.index');
    }

// public function indexTrackingUser()
    // {
    //     try {
    //         $data = [
    //             "userId" => "%"
    //         ];
    //         $headers = [
    //             "Authorization" => "Bearer ".Session::get('token')
    //         ];
    //         $response = Http::withHeaders($headers)->post("http://117.53.45.236:8002/api/", $data);
    //         $data = $response->json()['data'];
    //         return view('admin.tracking-user.index', ['users' => $data]);
    //     } catch (\Throwable $th) {
    //         return $th;
    //     }
    // }

////////////////////////////////////////////////// addView //////////////////////////////////////////////////
    public function show(TrackingUser $trackinguser)
    {
    	return view('trackinguser.show',compact('tracking-user'));
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
}
