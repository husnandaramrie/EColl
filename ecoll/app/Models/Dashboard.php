<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dashboard extends Model
{
    use HasFactory;

    protected $table = 'dashboard';
    
    protected $fillable = [
    	'no','tanggal','expired','tipe','messages','status',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
