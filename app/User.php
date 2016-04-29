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
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        $st = false;

        if ($this->roleID == 2) {
            $st = true;
        }

        return $st;
    }

    public function hasStore()
    {
        $store = $this->findStore();

        $st = true;
        /*if ($store) {
            $st = true;
        }*/

        return $st;
    }

    public function findStore()
    {
        return $this->hasOne('App\Store', 'userID');
    }

    public function link()
    {
        $store = $this->findStore();
        if ($store) {
            return $store->link;
        }
        else {
            return "ThereWillBeLink";
        }
    }
}
