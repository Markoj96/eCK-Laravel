<?php
/*
    Marko Jovanovic 0635/2015
    Veljko Djordjevic 0431/2015
*/
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
    User

    @version 1.0
*/

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'ime', 'prezime', 'pol', 'datumRodjenja', 'prebivaliste', 'zanimanje',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
