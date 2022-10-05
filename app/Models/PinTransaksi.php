<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PinTransaksi;

class PinTransaksiController extends Model
{
    use HasFactory;

    protected  $table = 'pintransaksi';

    protected $fillable = [
        'no','username','name','kantor','tanggal','pin','userlimit','maxtime','saldoawal','saldoakhir','kodeopen',
    ];
}

