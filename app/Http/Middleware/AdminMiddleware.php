<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $session = Session::get('token');
        $data = [
            "userId" => "%"
        ];
        $response = Http::withHeaders([
            "Authorization" => "Bearer ".$session
        // ])->post("http://117.53.45.236:8002/api/User/Read", $data);
        ])->post( env('APP_URL') . "/api/User/Read", $data);
        $result = $response->body() != null || strlen($response->body()) > 0 ? true : false;

        if ($session != null && $result == true) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
