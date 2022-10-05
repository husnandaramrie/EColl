<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataTransaksiController extends Model
{
    use HasFactory;
    protected  $table = 'data_transaksi';

    // protected $fillable = [
    //     'no','username','name','kantor','tanggal','pin','userlimit','maxtime','saldoawal','saldoakhir','kodeopen',
    // ];

}