<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
     //
    public function create(){
    	return view('videos.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'filenames'=>'required',
    		'filenames.*'=>'mimes:mp4,mp3,ogg,zip']);

    	if ($request->hasfile('filenames')) {
    		foreach ($request->file('filenames') as $file) {
    			$name = time().'.'.$file->extension();
    			$file->move(public_path().'/videos/'.$name);
    			$data[] = $name;
    		}
    	}

    	$file = new Video();
    	$file->filenames = json_encode($data);
    	$file->save();

    	return back()->with('success','files has been successfully added');
    }
}
