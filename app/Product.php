<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'userId', 'name', 
        'description', 'type'
    ];

    public function setUpdatedAt($value) {
        //
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties() {
        return $this->hasMany('App\Property', 'productId');
    }


    public function getImages() {
        return $this->properties()->where('name', 'image')->get();
    }

    /**
     * @param $name
     * @return bool
     */
    public function addImage($name) {
        return $this->addProperty('image', $name);
    }

    /**
     * @param $name
     * @param $value
     * @return bool
     */
    public function addProperty($name, $value) {
        $property = new Property();

        $property->productId = $this->id;
        $property->name = $name;
        $property->value = $value;

        return $property->save();
    }
}
