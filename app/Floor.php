<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';

    protected $fillable = [
        'name', 'description'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category', 'floorID');
    }

    public function stores()
    {
        return $this->hasMany('App\Store', 'floorID');
    }
}
