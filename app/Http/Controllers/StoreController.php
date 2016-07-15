<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Http\Traits\LinkTrait;
use Illuminate\Http\Request;

use App\Store;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    use LinkTrait;

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index($link)
    {
        $store = Store::where('link', $link)->firstOrFail();

        return view('public.store.index', [
            'store' => $store
        ]);
    }

    public function edit()
    {
        $store = Store::where('userId', Auth::user()->id)->first();

        $floors = Floor::all();

        return view('public.store.edit', [
            'store' => $store,
            'floors' => $floors
        ]);
    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;

        $store = Store::where('userId', $userId)->first();

        $this->validate($request, [
            'link' => 'min:3|max:25|unique:stores,link,' . $userId . ',userId',
            'brandName' => 'max:50',
            'contactData' => 'max:150',
            'photo' => 'image|max:2500',
            'poster' => 'image|max:3500'
        ]);

        $data = $request->except(['photo', 'poster']);
        $data['link'] = trim($data['link']);

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

    public function monTest()
    {
        $store = new Store();

        $store->setConnection('mongodb');

        $res = $store->where('mystore', 'REALLY MYSTORE')->get();

        dd($res);
    }
}
