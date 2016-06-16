<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public $incrementing = false;
    protected $primaryKey = 'userID';

    protected $fillable = [
        'link', 'brandName',
        'photo', 'poster',
        'contactData', 'floorID'
    ];

}
