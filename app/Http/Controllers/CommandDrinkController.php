<?php

namespace App\Http\Controllers;

use App\CommandDrink;
use Illuminate\Http\Request;

class CommandDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $commandDrinks = CommandDrink::orderBy('title','asc')->paginate(20);
        return view('backend.site.home.drink.index',compact('commandDrinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.site.home.drink.create');
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
            'title' => 'required|min:1|max:255',
            'description' => 'required|min:5|max:255',
            'old_price' =>'required',
            'new_price' => 'required',
            'type' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=1900,min_height=1200',

        ]);

        $storagepath = $request->file('image')->store('public/drinks');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        CommandDrink::create($data);

        return redirect()->route('command-drink.index')->with('success', 'New Command Drink item created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommandDrink  $commandDrink
     * @return \Illuminate\Http\Response
     */
    public function show(CommandDrink $commandDrink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommandDrink  $commandDrink
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandDrink $commandDrink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommandDrink  $commandDrink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandDrink $commandDrink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommandDrink  $commandDrink
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandDrink $commandDrink)
    {
        //
    }
}
