<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('created_at','desc')->paginate(20);
        return view('backend.site.home.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.site.home.event.create');
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
            'description' =>'required',
            'date' => 'required',
            'time' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
        ]);

        $storagepath = $request->file('image')->store('public/events');
        $fileName = basename($storagepath);
        $data = $request->all();
        $data['image'] = $fileName;

        Event::create($data);

        return redirect()->route('events.index')->with('success','Event created successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event = Event::findOrFail($id);
        return view('backend.site.home.event.edit',compact('event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:3072',

        ]);
        $event = Event::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/events/".$event->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/events');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $event->fill($data);
        $event->save();

        return redirect()->route('events.index')->with('success', 'event item updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::findOrFail($id);
        $file_path = "public/events/".$event->image;
            Storage::delete($file_path);
        $event->delete();
        return redirect()->back();

    }
}
