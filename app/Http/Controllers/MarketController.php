<?php

namespace App\Http\Controllers;

use App\Floor;
use Illuminate\Http\Request;

use App\Http\Requests;

class MarketController extends Controller
{
    public function index()
    {
        $floors = Floor::all();

        return view('index', [
            'floors' => $floors
        ]);
    }
}
