<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        return $this->hasMany('App\Order');
    }

    /*
    public function country(){
        return $this->hasOne('App\Country','id','country');
    }

    public function state(){
        return $this->hasOne('App\State','id','city');
    }
    */
}
