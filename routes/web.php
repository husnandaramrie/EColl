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
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PinTransaksiController;
use App\Http\Controllers\TrackingUserController;
use App\Http\Controllers\UserControllerNew;
use App\Http\Controllers\CekTrGandaController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\DataGandaController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\RekapTransaksiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\QRNasabahKreController;
use App\Http\Controllers\QRNasabahTabController;
use App\Http\Controllers\RekapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for yocur application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::post("/login_api", [NewLoginController::class, 'login'])->name('login_api');

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//Artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');

Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');

//Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

//Tracking User
Route::get('/tracking-user', [TrackingUserController::class, 'index'])->name('tracking-user');
Route::get('/tracking-user/{tracking-user:slug}', [TrackingUserController::class, 'show'])->name('tracking-user.show');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::name('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');

        // Log Activity
        Route::get('add-to-log', 'HomeController@myTestAddToLog');
        Route::get('logActivity', 'HomeController@logActivity');

        Route::resource('pengumuman', 'PengumumanController');
        Route::resource('agenda', 'AgendaController');
        Route::resource('artikel', 'ArtikelController');
        Route::resource('kategori-artikel', 'KategoriArtikelController');

        // MANAGEMENT USER
        Route::get('/users', [UserControllerNew::class, 'index'])->name('users');
        Route::get('/users/add', [UserControllerNew::class, 'addView'])->name('users.addView');
        Route::post('/users/store', [UserControllerNew::class, 'storeUser'])->name('users.store');
        Route::get('/users/update/view/{id}', [UserControllerNew::class, 'updateView'])->name('users.update.view');
        Route::post('/users/update/store', [UserControllerNew::class, 'edit'])->name('users.update.store');
        Route::get('/users/destroy/{id}', [UserControllerNew::class, 'destroy'])->name('users.destroy');
        Route::post('/users/cabang', [UserControllerNew::class, 'clientList'])->name('users.cabang');

        // PIN TRANSAKSI
        Route::get('/pintransaksi', [PinTransaksiController::class, 'indexPin'])->name('pintransaksi');
        Route::get('/pintransaksi/addView', [PinTransaksiController::class, 'addview'])->name('pintransaksi.addView');
        Route::get('/pintransaksi/addViewPin', [PinTransaksiController::class, 'addviewPin'])->name('pintransaksi.addViewPin');
        Route::post('/pintransaksi/storePin', [PinTransaksiController::class, 'storePin'])->name('pintransaksi.storePin');
        Route::get('/pintransaksi/updateViewPin/view/{id}', [PinTransaksiController::class, 'updateViewPin'])->name('pintransaksi.updateViewPin.view');
        Route::post('/pintransaksi/updateViewPin/store', [PinTransaksiController::class, 'updateViewPin'])->name('pintransaksi.updateViewPin.store');
        Route::get('/pintransaksi/editPin/view/{id}', [PinTransaksiController::class, 'editPin'])->name('pintransaksi.editPin.view');
        Route::post('/pintransaksi/editPin/store', [PinTransaksiController::class, 'editPin'])->name('pintransaksi.editPin.store');
        Route::get('/pintransaksi/closePin/{id}/{refno}', [PinTransaksiController::class, 'closeviewPin'])->name('pintransaksi.closePin');
        Route::post('/pintransaksi/destroyPin', [PinTransaksiController::class, 'destroyPin'])->name('pintransaksi.destroyPin');

        ///////////////////////////////////////////////////// TRANSAKSI //////////////////////////////////////////////////////////
        // DATA TRANSAKSI
        Route::resource('data_transaksi', 'DataTransaksiController');
        Route::get('/data_transaksi', [DataTransaksiController::class, 'indexDataTransaksi'])->name('data_transaksi');
        //Route::post('/data_transaksi/addView', [DataTransaksiController::class, 'addview'])->name('data_transaksi.addView');
        Route::get('/data_transaksi/destroyDataTrans/{id}', [DataTransaksiController::class, 'destroyDataTrans'])->name('data_transaksi.destroyDataTrans');

        // REKAP TRANSAKSI
        //Route::resource('rekap','RekapController');
        Route::post('/rekap/read', [RekapController::class, 'readRekap'])->name('rekap.read');
        Route::get('/rekap', [RekapController::class, 'indexRekap'])->name('rekap');

        //Route::post('/cek_tr_ganda', [CekTrGandaController::class, 'indexCekTransGan'])->name('cek_tr_ganda');
        //Route::post('/cek_tr_ganda/addView', [CekTrGandaController::class, 'addview'])->name('cek_tr_ganda.addView');
        // CEK VALIDASI
        Route::get('/validasi', [ValidasiController::class, 'indexValidasi'])->name('validasi');
        Route::post('/addView', [ValidasiController::class, 'addview'])->name('validasi.addView');

        // SETTING
        Route::resource('setting', 'SettingController');
        Route::get('/setting', [SettingController::class, 'indexSetting'])->name('setting');
        Route::post('/setting/addView', [SettingController::class, 'addview'])->name('setting.addView');
        Route::post('/setting/storeSetting', [SettingController::class, 'storeSetting'])->name('setting.storeSetting');
        Route::get('/setting/storeSetting', [SettingController::class, 'storeSetting'])->name('setting.storeSetting');
        Route::post('/setting/addViewSetting', [SettingController::class, 'addviewSetting'])->name('setting.addViewSetting');
        Route::get('/setting/updateViewSetting/view/{id}', [SettingController::class, 'updateViewSetting'])->name('setting.updateViewSetting.view');
        Route::post('/setting/updateViewSetting/store', [SettingController::class, 'edit'])->name('setting.updateViewSetting.store');

        // DASHBOARD/BOARD
        // Route::resource('board','BoardController');
        Route::get('/board', [BoardController::class, 'indexBoard'])->name('board');
        Route::get('/board/addView', [BoardController::class, 'addview'])->name('board.addView');
        Route::post('/board/storeBoard', [BoardController::class, 'storeBoard'])->name('board.storeBoard');
        Route::get('/board/storeBoard', [BoardController::class, 'storeBoard'])->name('board.storeBoard');
        Route::post('/board/addViewBoard', [BoardController::class, 'addviewBoard'])->name('board.addViewBoard');
        Route::get('/board/updateViewBoard/view/{id}', [BoardController::class, 'updateViewBoard'])->name('board.updateViewBoard.view');
        Route::post('/board/updateViewBoard/store', [BoardController::class, 'edit'])->name('board.updateViewBoard.store');
        Route::get('/dashboard/destroyBoard/{id}', [BoardController::class, 'destroyBoard'])->name('board.destroyBoard');

        // QR NASABAH Kredit
        Route::resource('kredit', 'QRNasabahKreController');
        Route::get('/kredit', [QRNasabahKreController::class, 'indexkredit'])->name('kredit');
        Route::post('/kredit/cari', [QRNasabahKreController::class, 'carikredit'])->name('kredit.cari');
        Route::post('/addView', [QRNasabahKreController::class, 'addview'])->name('kredit.addView');

        // QR NASABAH Tabungan
        Route::resource('tabungan', 'QRNasabahTabController');
        Route::get('/tabungan', [QRNasabahTabController::class, 'indexTabungan'])->name('tabungan');
        Route::post('/tabungan/cari', [QRNasabahTabController::class, 'cariTabungan'])->name('tabungan.cari');
        Route::post('/tabungan/cetak',[QRNasabahTabController::class, 'cetakTabungan'])->name('tabungan.cetak');
        Route::post('/addView', [QRNasabahTabController::class, 'addview'])->name('tabungan.addView');

        // TRACKING USER
        Route::resource('tracking-user', 'TrackingUserController');
        Route::get('/tracking-user', [TrackingUserController::class, 'indexTrackingUser'])->name('tracking-user');
        Route::post('/tracking-user/addView', [TrackingUserController::class, 'addView'])->name('tracking-user.addView');
        Route::post('/tracking-user/addViewTrackingUser', [TrackingUserController::class, 'addViewTrackingUser'])->name('tracking-user.addViewTrackingUser');
        Route::post('/tracking-user/storeTrackingUSer', [TrackingUserController::class, 'storeTrackingUSer'])->name('tracking-user.storeTrackingUSer');
    });
});
