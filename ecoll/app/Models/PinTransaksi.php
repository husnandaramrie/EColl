<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinTransaksi extends Model
{
    use HasFactory;

    protected  $table = 'pintransaksi';

    protected $fillable = [
        'no','username','nama','kantor','tanggal','pin','limit','waktumax','saldoawal','saldoakhir','kodeopen',
    ];
}
