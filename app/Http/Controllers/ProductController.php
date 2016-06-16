<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
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

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index($link)
    {
        $store = Store::where('link', $link)->first();
        $products = Product::where('userID', $store->userID);

        return view('public.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('public.product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'max:625',
            'images[]' => 'image|max:3000'
        ]);

        $data = $request->except(['images[]']);

    }

    public function imageAJAXUpload(Request $request)
    {
        $path = 'uploads/';

        $response = array();

        if ($request->ajax()) {

            $files = $request->allFiles();
            var_dump($files);
            foreach ($files as $file) {
                $fileName = $this->generateImageName();

                //$uploadStatus = $file->move($path . 'temp', $fileName);

                //if ($uploadStatus) {
                    $response[] = $fileName;
                //}
            }
        }
        return response()->json($response);
    }

    protected function generateImageName($length = 11)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
