<?php

namespace App\Http\Controllers;

use App\CommandFood;
use Illuminate\Http\Request;

class CommandFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $commandFoods = CommandFood::orderBy('title','asc')->paginate(20);
        return view('backend.site.home.food.index',compact('commandFoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.site.home.food.create');
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

        $storagepath = $request->file('image')->store('public/foods');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Room::create($data);

        return redirect()->route('command-food.index')->with('success', 'New Command Food item created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommandFood  $commandFood
     * @return \Illuminate\Http\Response
     */
    public function show(CommandFood $commandFood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommandFood  $commandFood
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandFood $commandFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommandFood  $commandFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandFood $commandFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommandFood  $commandFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandFood $commandFood)
    {
        //
    }
}
