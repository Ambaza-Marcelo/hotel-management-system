<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    //
	public function index(){
        $file = File::all();
		return view('pictures.index',compact('file'));
	}

    public function create(){
    	return view('pictures.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'filenames'=>'required',
    		'filenames.*'=>'mimes:doc,pdf,docx,jpg,jpeg,png,zip']);

    	if ($request->hasfile('filenames')) {
    		foreach ($request->file('filenames') as $file) {
    			$name = time().'.'.$file->extension();
    			$file->move(public_path().'/pictures/'.$name);
    			$data[] = $name;
    		}
    	}

    	$file = new File();
    	$file->filenames = json_encode($data);
    	$file->save();

    	return back()->with('success','files has been successfully added');
    }
}
