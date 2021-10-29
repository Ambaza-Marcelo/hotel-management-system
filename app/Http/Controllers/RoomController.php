<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Room;

class RoomController extends Controller
{
    //

    public function index()
    {
    	$rooms = Room::with('category')->paginate(10);
    	return view('backend.room.index',compact('rooms'));
    }

    public function create()
    {
    	$categories = Category::get();
    	return view('backend.room.create',compact('categories'));
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'num_room' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/rooms');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Room::create($data);

        return redirect()->route('admin-room-list')->with('success', 'New room  created.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $room = Room::findOrFail($id);
        $categories = Category::get();
        return view('backend.room.edit', compact('room','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'num_room' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:3072',

        ]);

        $room = Room::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/rooms/".$room->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/rooms');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $room->fill($data);
        $room->save();

        return redirect()->route('admin-room-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room = Room::findOrFail($id);
        $file_path = "public/rooms/".$room->image;
            Storage::delete($file_path);
        $room->delete();
        return redirect()->back();
    }
}
