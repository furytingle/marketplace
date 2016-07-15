<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'floorId'
    ];

    public function floor()
    {
        return $this->belongsTo('App\Floor', 'floorId');
    }
}
