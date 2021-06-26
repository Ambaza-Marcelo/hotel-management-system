<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

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
        $sliders = Slider::orderBy('order', 'asc')->paginate(25);
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
            'subtitle' => 'required|min:5|max:255',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=1900,min_height=1200',

        ]);

        $storagepath = $request->file('image')->store('public/sliders');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Slider::create($data);

        return redirect()->back()->with('success', 'New slider item created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
        return view('backend.site.home.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
        $request->validate([
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required|min:5|max:255',
            'image' => 'mimes:jpeg,jpg,png|max:2048|dimensions:min_width=1900,min_height=1200',

        ]);

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

        return redirect()->route('slider.index')->with('success', 'Slider item updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider item deleted.');
    }
}
