<?php

namespace App\Http\Controllers;

use App\Floor;
use Illuminate\Http\Request;

use App\Http\Requests;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = Floor::all();

        return view('admin.floor.index', [
            'floors' => $floors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $data = $request->all();
        Floor::create($data);

        $request->session()->flash('flash_message', 'Floor created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floor = Floor::findOrFail($id);

        return view('admin.floor.edit', [
            'floor' => $floor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $floor = Floor::findOrfail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = $request->all();

        $floor->fill($data);

        $request->session()->flash('flash_message', 'Floor updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $floor = Floor::findOrFail($id);

        $floor->delete();

        $request->session()->flash('flash_message', 'Floor deleted');

        return redirect()->back();
    }
}
