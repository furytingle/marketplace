<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $store = Store::where('userID', Auth::user()->id)->first();

        return view('public.store.index', [
            'store' => $store
        ]);
    }

    public function edit()
    {
        $store = Store::where('userID', Auth::user()->id)->first();

        return view('public.store.edit', [
            'store' => $store
        ]);
    }

    public function update(Request $request)
    {
        $store = Store::where('userID', Auth::user()->id)->first();

        $this->validate($request, [
            'link' => 'max:25',
            'brandName' => 'max:50',
            'contactData' => 'max:150',
            'photo' => 'image|max:2500',
            'poster' => 'image|max:3500'
        ]);

        $data = $request->except(['photo', 'poster']);

        $path = 'uploads/';

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $photo = $request->file('photo');

            $photoName = $photo->getClientOriginalName();

            $photoStatus = $photo->move($path . 'photo', $photoName);

            if ($photoStatus) {
                $store->photo = $photoName;
            }
        }

        if ($request->hasFile('poster') && $request->file('poster')->isValid()) {

            $poster = $request->file('poster');

            $posterName = $poster->getClientOriginalName();

            $posterStatus = $poster->move($path . 'poster', $posterName);

            if ($posterStatus) {
                $store->poster = $posterName;
            }
        }

        $store->fill($data)->save();

        $request->session()->flash('flash_message', 'Saved');

        return redirect()->back();
    }
}
