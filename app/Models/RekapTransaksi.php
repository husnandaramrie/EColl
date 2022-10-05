<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\RekapTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekapTransaksiController extends Model
{
    use HasFactory;
    protected  $table = 'rekap_transaksi';

    // protected $fillable = [
    //     'no','username','name','kantor','tanggal','pin','userlimit','maxtime','saldoawal','saldoakhir','kodeopen',
    // ];

}