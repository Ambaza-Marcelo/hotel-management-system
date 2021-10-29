<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::orderBy('order', 'asc')->paginate(5);
        if(count($sliders)>10){
            Session::flash('warning','Don\'t add more than 10 slider for better site performance!');
        }
        return view('backend.site.home.slider.list', compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.site.home.slider.add');
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
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/sliders');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Slider::create($data);

        return redirect()->route('sliders.index')->with('success', 'New slider item created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $slider = Slider::findOrFail($id);
        return view('backend.site.home.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required',
            'order' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:3072',

        ]);
        $slider = Slider::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/sliders/".$slider->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/sliders');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $slider->fill($data);
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider item updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slider = Slider::findOrFail($id);
        $file_path = "public/sliders/".$slider->image;
            Storage::delete($file_path);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider item deleted.');
    }
}
