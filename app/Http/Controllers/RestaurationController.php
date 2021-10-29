<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Restauration;

class RestaurationController extends Controller
{
    //

    public function index()
    {
    	$restaurations = Restauration::paginate(10);
    	return view('backend.restauration.index',compact('restaurations'));
    }

    public function create()
    {
    	return view('backend.restauration.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/restaurations');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        Restauration::create($data);

        return redirect()->route('admin-restauration-list')->with('success', 'New restauration  created.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restauration  $restauration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $restaurations = Restauration::findOrFail($id);
        return view('backend.restauration.edit', compact('restaurations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restauration  $restauration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:3072',

        ]);

        $restauration = Restauration::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/restaurations/".$restauration->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/restaurations');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $restauration->fill($data);
        $restauration->save();

        return redirect()->route('admin-restauration-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restauration  $restauration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $restauration = Restauration::findOrFail($id);
        $file_path = "public/restaurations/".$restauration->image;
            Storage::delete($file_path);
        $restauration->delete();
        return redirect()->back();
    }
}
