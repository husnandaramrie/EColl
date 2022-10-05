<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Artikel;
use App\Models\Pengumuman;
use App\Models\PinTransaksi;
use App\Models\Transaksi;
use App\Models\Setting;
use App\Models\Dashboard;
use App\Models\QRNasabah;
use App\Models\TrackingUser;


class SettingController extends Model
{
    use HasFactory;

    protected  $table = 'setting';

    protected $fillable = [
        'promo','callcenter','limittarik','limitsetor','smscenter','pintarik','di',
    ];
}

