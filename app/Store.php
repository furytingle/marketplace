<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $timestamps = false;

    protected $table = 'stores';

    public $incrementing = false;
    protected $primaryKey = 'userID';

    protected $fillable = [
        'link', 'brandName',
        'photo', 'poster',
        'contactData', 'countryID'
    ];

}
