<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
    	$dashboard = Dashboard::with(['user'])->latest()->paginate(4);
    	return view('dashboard.index',compact('dashboard'));
    }

    public function show(Dashboard $dashboard)
    {
    	return view('dashboard.show',compact('dashboard'));
    }
}
