<?php

namespace App\Http\Controllers;

use App\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drinks = Drink::all();
        return view('drink.index',compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('drink.create');
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
            'name' => 'required',
            'quantity' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'profit' => 'required'
        ]);
        Drink::create($request->all());
        return redirect()->route('drinks.index')->with('success','Drink added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        //
        return view('drink.edit',compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        //
          $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'profit' => 'required'
        ]);
        $drink->update($request->all());
        return redirect()->route('drinks.index')->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
