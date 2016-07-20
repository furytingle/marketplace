<?php

namespace App\Http\Controllers;

use App\Http\Traits\StringGenerator;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use StringGenerator;

    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index() {
        $products = Product::where('userId', Auth::user()->id)->get();

        return view('public.product.index', [
            'products' => $products
        ]);
    }

    public function create() {
        return view('public.product.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'max:625',
            'image' => 'image|max:3000'
        ]);

        $data = $request->except(['image']);

        $product = new Product();
        $product->userId = Auth::user()->id;
        $product->fill($data)->save();

        $path = 'upload/product';
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = $this->generateImageName(15) . '.' . $image->getClientOriginalExtension();

            $st = $image->move($path, $imageName);
            if ($st) {
                $product->addImage($imageName);
            }
        }

        $request->session()->flash('flash_message', 'Saved');

        return redirect()->back();
    }
    
    //TODO refactor image upload later
    /*public function imageAJAXUpload(Request $request) {
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
    */
}
