<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller

{
    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(),[
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
       $username = $request->username;
       $password = $request->password;

       try {
        $res = Http::post("http://117.53.45.236:8002/api/Login/Authorize", [
            'userName' => $username,
            'password' => $password
        ]);
        return $res->json();
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    // method for user logout and delete token
    public function logout()
    {


        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
