<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\ECollectUser as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ECollectUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'Ecollect_User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name','username','email', 'passcode','active'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Passwd',
    ];
}