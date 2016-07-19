<?php

namespace App\Http\Traits;
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 05.05.16
 * Time: 13:37
 */

/**
 * Class StringGenerator
 * @package App\Http\Traits
 */
trait StringGenerator
{

    /**
     * @param $id
     * @return string
     */
    protected function makeLink($id) {
        $hash = md5($id . 'M' . $id . 'Place');
        $link = substr($hash, 0, 20);

        return $link;
    }

    /**
     * @param int $length
     * @return string
     */
    protected function generateImageName($length = 11) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}