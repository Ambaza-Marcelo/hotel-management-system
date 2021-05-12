<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    //
    public function create(){
    	return view('report.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'title' => 'required',
    		'reportnames'=>'required',
    		'reportnames.*'=>'mimes:doc,pdf,docx,jpg,jpeg,png,zip']);

    	if ($request->hasfile('reportnames')) {
    		foreach ($request->file('reportnames') as $file) {
    			$name = time().'.'.$file->extension();
    			$file->move(public_path().'/reports/'.$name);
    			$data[] = $name;
    		}
    	}

    	$file = new Report();
        $file->title = $request->title;
    	$file->reportnames = json_encode($data);
    	$file->save();

    	return back()->with('success','report has been successfully added');
    }
}
