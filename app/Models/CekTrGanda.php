<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CekTrGanda;

class CekTrGanda extends Model
{
    use HasFactory;

    protected  $table = 'cek_tr_ganda';

    protected $fillable = [
        'no','username','name','kantor','tanggal','pin','userlimit','maxtime','saldoawal','saldoakhir','kodeopen',
    ];
}