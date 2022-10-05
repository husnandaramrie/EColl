<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
    	$users = Users::with(['user'])->latest()->paginate(4);
    	return view('users.index',compact('users'));
    }

    public function show(Users $setting)
    {
    	return view('users.show',compact('users'));
    }
}
