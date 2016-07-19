<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public $incrementing = false;
    protected $primaryKey = 'userId';

    protected $fillable = [
        'link', 'brandName',
        'photo', 'poster',
        'contactData', 'floorId'
    ];
    
    public function products() {
        return $this->hasMany('App\Product', 'storeId');
    }
}
