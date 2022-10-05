<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DashboardController extends Model
{
    use HasFactory;

    protected $table = 'dashboard';
    
    protected $fillable = [
    	'no','refDate','refType','expDate','content','status','picture',
    ];

    public function dashboard()
    {
    	return $this->belongsTo(User::class);
    }
}
