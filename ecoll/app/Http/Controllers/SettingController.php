<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
    	$Setting = Setting::with(['user'])->latest()->paginate(4);
    	return view('setting.index',compact('setting'));
    }

    public function show(Setting $setting)
    {
    	return view('setting.show',compact('setting'));
    }
}
