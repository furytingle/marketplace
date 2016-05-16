<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{

    // DEVELOP LATER
    protected function mongoTest()
    {
        $client = new \MongoDB\Client("mongodb://localhost:27017");

        $collection = $client->demo->beers;

        $result = $collection->findOne(['name' => 'Hinterland']);

        echo $result['brewery'];
    }
}
