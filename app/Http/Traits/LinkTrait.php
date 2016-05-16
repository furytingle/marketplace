<?php

namespace App\Http\Traits;
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 05.05.16
 * Time: 13:37
 */

trait LinkTrait {
    protected function makeLink($id)
    {
        $hash = md5($id . 'M' . $id . 'Place');
        $link = substr($hash, 0, 20);

        return $link;
    }
}