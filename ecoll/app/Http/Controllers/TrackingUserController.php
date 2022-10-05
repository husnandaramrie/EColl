<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrackingUser;

class TrackingUserController extends Controller
{
    public function index()
    {
    	$trackinguser = TrackingUser::with(['user'])->latest()->paginate(4);
    	return view('trackinguser.index',compact('trackinguser'));
    }

    public function show(TrackingUser $trackinguser)
    {
    	return view('trackinguser.show',compact('trackinguser'));
    }
}
