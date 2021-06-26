<?php

namespace App\Http\Controllers;

use App\PointKey;
use Illuminate\Http\Request;

class PointKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pointkeys = PointKey::orderBy('created_at', 'desc')->paginate();
        return view('backend.site.home.point-key.index',compact('pointkeys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.site.home.point-key.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description'=> 'required|min:5',
        ]);

        PointKey::create($request->all());
        return redirect()->route('point-keys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PointKey  $pointKey
     * @return \Illuminate\Http\Response
     */
    public function show(PointKey $pointKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PointKey  $pointKey
     * @return \Illuminate\Http\Response
     */
    public function edit(PointKey $pointKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PointKey  $pointKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointKey $pointKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PointKey  $pointKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointKey $pointKey)
    {
        //
    }
}
