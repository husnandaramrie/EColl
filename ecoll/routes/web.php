<?php

use Illuminate\Support\Facades\Route;

//Admin Namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ChangePasswordController;


//Controllers Namespace
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\NewLoginController;
use App\Http\Controllers\TrackingUserController;
use App\Http\Controllers\UserControllerNew;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("/login_api", [NewLoginController::class, 'login'])->name('login_api');

//Home
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

//Artikel
Route::get('/artikel',[ArtikelController::class,'index'])->name('artikel');
Route::get('/artikel/search',[ArtikelController::class,'search'])->name('artikel.search');

Route::get('/artikel/{artikel:slug}',[ArtikelController::class,'show'])->name('artikel.show');

//Pengumuman
Route::get('/pengumuman',[PengumumanController::class,'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}',[PengumumanController::class,'show'])->name('pengumuman.show');

//Tracking User
Route::get('/tracking-user',[TrackingUserController::class,'index'])->name('tracking-user');
Route::get('/tracking-user/{tracking-user:slug}',[TrackingUserController::class,'show'])->name('tracking-user.show');

//Admin
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['admin']],function(){
	Route::name('admin.')->group(function(){

		Route::get('/',[AdminController::class,'index'])->name('index');
		Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
		Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');

        // users
        Route::get('/users', [UserControllerNew::class, 'index'])->name('users');
        Route::get('/users/add', [UserControllerNew::class, 'addView'])->name('users.addView');
        Route::post('/users/store', [UserControllerNew::class, 'storeUser'])->name('users.store');
        Route::get('/users/update/view/{id}', [UserControllerNew::class, 'updateView'])->name('users.update.view');
        Route::post('/users/update/store', [UserControllerNew::class, 'edit'])->name('users.update.store');
        Route::get('/user/destroy/{id}', [UserControllerNew::class, 'destroy'])->name('users.destroy');

		Route::resource('pengumuman','PengumumanController');
		Route::resource('agenda','AgendaController');
		Route::resource('artikel','ArtikelController');
		Route::resource('kategori-artikel','KategoriArtikelController');
	});
});
