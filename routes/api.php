<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserControllerNew;

// /**
//  * route "/register"
//  * @method "POST"
//  */
// Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */


/**
 * route "/user"
 * @method "GET"
 */
// Route::post('/users/cabang', [UserControllerNew::class, 'clientList'])->name('api.users.cabang');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// <!-- <?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// }); -->
